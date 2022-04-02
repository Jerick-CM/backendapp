<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    public function run()
    {




        $users =  DB::table('users')->insert([
            'name' => "master administrator",
            'email' => 'admin@itoffice.com',
            'email_verified_at' => now(),
            'password' => bcrypt(env('MASTERPASSWORD')),
            'remember_token' => Str::random(10),
            'is_admin' => 1,
        ]);

        \App\Models\UserDetails::factory(1)->create([
            'user_id' =>  DB::getPdo()->lastInsertId()
        ]);

        for ($x = 1; $x <= 9; $x++) {
            $faker_users = \App\Models\User::factory(1)->create();
            \App\Models\UserDetails::factory(1)->create([
                'user_id' => $faker_users[0]->id,
            ]);
        }


    }
}
