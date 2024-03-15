<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFindRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
//        dd("halo!");
        $users = User::withTrashed()->orderBy("created_at", "desc")->paginate(10);
        $usersCount = User::query()->count();
        return view("admin.users.index", [
            "users" => $users,
            "usersCount" => $usersCount,
        ]);
    }

    public function show($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $myCourses = $user->myCourses;
        return view("admin.users.show", [
            "user" => $user,
            "myCourses" => $myCourses,
            "courses" => $user->courses
        ]
    );
    }

    public function find(UserFindRequest $request)
    {
        $data = $request->validated();
        $query = User::withTrashed()->where($data["field"], "LIKE", "%" . $data["body"] . "%");
        $usersCount = User::query()->count();
        if ($data["deleted"] === "true") {
            $query->whereNotNull("deleted_at");
        } elseif ($data["deleted"] === "false") {
            $query->whereNull("deleted_at");
        }
        $users = $query->get();
        return view("admin.users.find", [
            "users" => $users,
            "usersCount" => $usersCount,
            "body" => $data['body']
        ]);
    }

    public function edit($id)
    {
        $user = User::query()->findOrFail($id);
        return view("admin.users.edit", [
            "user" => $user
        ]);
    }

    public function update($id, UserRequest $request)
    {
        $data = $request->validated();
        $user = User::withTrashed()->findOrFail($id);
        $user->update([
            "user_name" => $data["user_name"],
            "first_name" => $data["first_name"],
            "last_name" => $data["last_name"],
            "email" => $data["email"],
            "password" => $data["password"],
        ]);
        return redirect()->route("admin.users.show", $id);
    }

    public function delete($id)
    {
        User::query()->findOrFail($id)->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        User::onlyTrashed()->find($id)->restore();
        return redirect()->back();
    }
}
