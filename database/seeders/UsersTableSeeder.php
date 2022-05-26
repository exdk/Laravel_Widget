<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2021-10-13 13:46:53',
                'verification_token' => '',
                'two_factor_code'    => '',
                'surname'            => '',
                'oth'                => '',
                'pfr'                => '',
                'mobile'             => '',
                'skype'              => '',
                'icq'                => '',
            ],
        ];

        User::insert($users);
    }
}
