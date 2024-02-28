<?php

namespace App\Traits;

trait HttpResponses
{
    public function success($data, $message = null, $code = 200)
    {
        return response()->json([
            "data" => $data,
            "message" => $message,
            "status" => "Request was succesful!",
        ], $code);
    }

//    public function error($data, $message = null, $code)
//    {
//        return response()->json([
//            "data" => $data,
//            "message" => $message,
//            "status" => "Has error...",
//        ], $code);
//    }
}
