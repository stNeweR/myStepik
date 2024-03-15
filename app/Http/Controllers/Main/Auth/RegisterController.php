<?php

namespace App\Http\Controllers\Main\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    use HttpResponses;


    public function __invoke()
    {
        return view("app.auth.register");
    }

    public function store(UserRequest $request)
    {
        $credentials = $request->validated();
//        dump($request->boolean('remember'));
//        dd($credentials);
        $user = User::query()->create([
            'user_name' => $credentials['user_name'],
            'full_name' => $credentials['full_name'],
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'description' => '',
        ]);

        Auth::login($user, $request->boolean('remember'));

        return redirect()->route('profile');
    }
}
