<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'role' => 'super-admin',
            ],
            [
                'name' => 'customer1',
                'email' => 'customer1@example.com',
                'password' => bcrypt('password'),
                'role' => 'customer',
            ]
        ];

        foreach ($users as $user) {
            $_user = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);

            $_user->assignRole($user['role']);
        }
    }
}
