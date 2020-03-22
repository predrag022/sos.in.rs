<?php

use App\User;
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
                'password'           => '$2y$10$PkO6k2foiJd5WY4OMsA2He1iPVLrnwVEva1Ep3dbc6pvmzNlOaEQS',
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2020-03-22 11:59:50',
                'verification_token' => '',
                'token'              => '',
            ],
        ];

        User::insert($users);

    }
}
