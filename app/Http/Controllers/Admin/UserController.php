<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->orderBy("created_at", "desc")->paginate(12);
        return view("admin.users.index", [
            "users" => $users,
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
