<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\UserRequest;
use App\Traits\HttpResponses;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginUserRequest $request)
    {
        $data = $request->validated();

        if (! Auth::attempt($data)) {
            return $this->error("", "Credentionals!", 401);
        }

        $user = User::query()->where("email", $data["email"])->first();

        return $this->success([
            "user" => $user,
            "token" => $user->createToken("API TOKEN of " . $user->user_name)->plainTextToken
        ]);
    }

    public function register(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::query()->create([
            "user_name" => $data["user_name"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"]),
            "first_name" => $data["first_name"],
            "last_name" => $data["last_name"],
        ]);

        return $this->success([
            "data" => $user,
            "token" => $user->createToken("API token of" . $user->user_name)->plainTextToken,
        ]);
    }

    public function logout()
    {
        // Auth::user()->currentAccessToken()->delete();

        return $this->success([
            "message" => "Logged out and delete token!"
        ]);
    }
}
