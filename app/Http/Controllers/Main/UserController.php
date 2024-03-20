<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $courses = Auth::user()->courses;
        $myLessons = Auth::user()->lessons;
        $courses = $courses->map(function ($course) {
            $course["themes"] = $course->themes;
            return $course;
        });
        $courses = $courses->map(function ($course) {
            $themes = $course["themes"]->map(function ($theme) {
                $theme["lessons"] = $theme->lessons;
            });
            return $course;
        });
        return view("app.user.index", [
            "user" => $user,
            "courses" => $courses,
            "myLessons" => $myLessons,
        ]);
    }

    public function edit()
    {
        return view('app.user.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'user_name' => [ Rule::unique('users', 'user_name')->ignore(Auth::id()), "string", "required"],
            'full_name' => ['required', 'string'],
            'description' => ['string']
        ]);

        $user = User::query()->find(Auth::id());

        $user->update($data);

        return redirect()->route('profile');

    }

}
