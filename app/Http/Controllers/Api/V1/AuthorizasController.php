<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\WeappAuthorizationRequest;
use App\Models\User;
use EasyWeChatComposer\EasyWeChat;
use http\Env\Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AuthorizasController extends Controller
{
    //
    public function weappstore(WeappAuthorizationRequest $request){
        $code=$request->get('code');
        $logininfo=$request->except('code');
        $miniProgram=\EasyWeChat::miniProgram();
        $data=$miniProgram->auth->session($code);
        if(isset($data['errcode'])){
            throw new AuthenticationException('code 不正确');
        }
        $user=User::where('weixin_openid',$data['openid'])->first();
        $attributes['weixin_session_key']=$data['session_key'];
        if(!$user){
            $add=[
                'avatar'=>$logininfo['userInfo']['avatarUrl'],
                'nickname'=>$logininfo['userInfo']['nickName'],
                'gender'=>$logininfo['userInfo']['gender'],
                'city'=>$logininfo['userInfo']['city'],
                'province'=>$logininfo['userInfo']['province'],
                'add_ip'=>$logininfo['loginIp'],
                'add_date'=>Carbon::now(),
                'last_login_date'=>Carbon::now(),
                'weixin_openid'=>$data['openid'],
                'weixin_session_key'=>$data['session_key']
            ];
            $newid=User::query()->insert($add);
            if ($newid){
                return response()->json([
                    'status'=>200,
                    'data'=>[
                        'openid'=>$data['openid'],
                        'bind_phone'=>0,
                    ],
                    'msg'=>'授权登陆成功'
                ]);
            }
        }

        $attributes['last_login_time']=$logininfo['timestamp'];
        $attributes['login_ip']=$logininfo['loginIp'];
        $user->update($attributes);
        if (!$user['phone']){
            return response()->json([
                'status'=>200,
                'data'=>[
                    'openid'=>$data['openid'],
                    'bind_phone'=>0,
                    'user'=>$user
                ],
                'msg'=>'授权登陆成功'
            ]);
        }
        return \response()->json([
            'status'=>200,
            'data'=>$user
        ]);

    }

}
