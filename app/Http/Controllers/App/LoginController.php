<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke()
    {
        return view("app.auth.login");
    }

    public function create(LoginUserRequest $request)
    {
        $credentials = $request->validated();
        if (!Auth::attempt($credentials, $request->boolean("remember"))) {
            return redirect()->back()->withErrors([
                "email" => "Ошибка в почте или пароле!"
            ]);
        }

        return redirect()->route("profile");
    }
}

