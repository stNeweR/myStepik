<?php

namespace Database\Seeders;

use App\Models\CourseUser;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;

trait UserSeed
{
    public function users($number)
    {
        User::factory()->create([
            'user_name' => 'stNeweR',
            "full_name" => "Egor Sarafannikov",
            'email' => 'shyguy096com@gmail.com',
            "description" => "Stepik admin",
        ]);
        User::factory($number)->create();
    }

    public function roles($number)
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
        RoleUser::factory($number)->create();
    }

    public function courseUser($number)
    {
        CourseUser::factory($number)->create();
    }
}
