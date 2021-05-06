<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function info(){

    }
    public function sendCode(Request $request){
        if (!$request->get('mobile')){
            return response()->json([
                'status'=>201,
                'msg'=>'手机号码不能为空'
            ]);
        }

    }
}
