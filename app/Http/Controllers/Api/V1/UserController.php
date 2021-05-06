<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BindPhoneRequest;
use App\Http\Requests\Api\VerificationCodeRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Overtrue\EasySms\EasySms;

class UserController extends Controller
{
    //
    public function info(){

    }
    public function sendCode(VerificationCodeRequest $request,EasySms $easySms){
        $phone=$request->get('phone');
        $code=str_pad(random_int(1,999999),6,0,STR_PAD_LEFT);
        if (!app()->environment('production')){
            $code='1234';
        }else{
            try {
                $result = $easySms->send($phone, [
                    'template' => config('easysms.gateways.aliyun.templates.register'),
                    'data' => [
                        'code' => $code
                    ],
                ]);
            }catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
                $message = $exception->getException('aliyun')->getMessage();
                abort(500, $message ?: '短信发送异常');
            }
        }
        $key = 'verificationCode_'.Str::random(15);
        $expiredAt = now()->addMinutes(5);
        // 缓存验证码 5 分钟过期。
        Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);
        return response()->json([
            'status'=>200,
            'data'=>[
                'key' => $key,
                'expired_at' => $expiredAt->toDateTimeString(),
            ]
        ])->setStatusCode(201);
    }
    public function verifyCode(BindPhoneRequest $request){
        $verifyData=Cache::get($request->input('verification_key'));
        if (!$verifyData){
            return response()->json(
                [
                    'status'=>201,
                    'msg'=>'验证码失效'
                ]
            )->setStatusCode(201);
        }
        if (!hash_equals($verifyData['code'],$request->input('verification_code'))){
            return response()->json(
                [
                    'status'=>201,
                    'msg'=>'验证码错误'
                ]
            )->setStatusCode(201);
        }
        $mobile_user=User::query()->where('weixin_openid',$request->input('open_id'))->first();
        if (empty($mobile_user['phone'])&& isset($mobile_user)){
            $bool=User::query()->where('weixin_openid',$request->input('open_id'))->update(['phone'=>$request->input('phone')]);
            if ($bool){
                \Cache::forget($request->verification_key);
                $mobile_user['phone']=$request->input('open_id');
                return response()->json(
                    [
                        'status'=>200,
                        'data'=>$mobile_user,
                'msg'=>'绑定成功'
            ]
                );
            }
        }else{
            abort('403','请先绑定微信');
        }

    }

}
