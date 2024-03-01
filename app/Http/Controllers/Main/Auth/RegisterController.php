<?php

namespace App\Http\Controllers\Main\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Traits\HttpResponses;


class RegisterController extends Controller
{
    use HttpResponses;


    public function __invoke()
    {
        return view("app.auth.register");
    }

    public function create(UserRequest $request)
    {
        $credentials = $request->validated();
        dd($credentials);
    }
}
