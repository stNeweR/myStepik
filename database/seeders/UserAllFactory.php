<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;

trait UserAllFactory
{
    public function users()
    {
        User::factory()->create([
            'user_name' => 'stNeweR',
            "full_name" => "Egor Sarafannikov",
            'email' => 'shyguy096com@gmail.com',
        ]);
        User::factory(40)->create();
    }

    public function roles()
    {
        Role::factory()->create([
            "body" => "admin"
        ]);
        Role::factory()->create([
            "body" => "author"
        ]);
        RoleUser::factory([
            "user_id" => 1,
            "role_id" => 1
        ])->create();
        RoleUser::factory(10)->create();
    }
}
