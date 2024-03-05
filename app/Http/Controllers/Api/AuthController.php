<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
       $rules=[
           'name'=>'required|string',
           'email'=>'required',
          'password'=>'required',
          'device_name'=>'required',
           'phone'=>'required'
       ];
       $input=$request->only('name','email','password','phone');
       $validator=Validator::make($input,$rules);

       $user=User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'phone'=>$request->phone,
           'password'=>Hash::make($request->password),
       ]);
        return $user->createToken($request->device_name)->plainTextToken;

    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            'device_name'=>'required'
        ]);
        $user=User::where('email',$request->email)->first();
        if(!$user){
            return response()->json('not authorized',201);
        }
        return $user->createToken($request->device_name)->plainTextToken;
    }

}
