<?php
namespace App\Http\Trait;

trait MessageTrait
{
    public function successMessage($message,$code){
        return response()->json([
           'message'=>$message,
            'code'=>$code
        ]);
    }
    public function errorMessage($message,$code)
    {
        return response()->json([
           'msg'=>$message,
           'code'=>$code ,
        ]);
    }
}
