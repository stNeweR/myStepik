<?php

namespace App\Http\Controllers\Main\Auth;

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

        $request->session()->regenerate();

        return redirect()->route("profile");
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back();
    }
}

