<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFindRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
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
        return view("admin.users.show", [
            "user" => $user,
        ]
    );
    }

    public function find(UserFindRequest $request)
    {
        $data = $request->validated();
        // dump($request->validated());
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
        ]);
    }


    public function delete($id)
    {
        User::query()->find($id)->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        User::onlyTrashed()->find($id)->restore();
        return redirect()->back();
    }
}
