<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'TestUser1',
            'email' => 'example1@test.com',
            'password' => '$2y$10$z8OQnT5VHJKOGehTxDEwXe2zGmTCSRgAvjyu9Yx0gjrrYndSdVpwC',
            'neptun_code' => 'AAA123',
            'department' =>'',
            'address_id' =>null,
            'role_id' =>'1',
        ]);
        User::create([
            'name' => 'TestUser2',
            'email' => 'example2@test.com',
            'password' => '$2y$10$z8OQnT5VHJKOGehTxDEwXe2zGmTCSRgAvjyu9Yx0gjrrYndSdVpwC',
            'neptun_code' => 'AAA123',
            'department' =>'',
            'address_id' =>null,
            'role_id' =>'2',
        ]);
        User::create([
            'name' => 'TestUser3',
            'email' => 'example3@test.com',
            'password' => '$2y$10$z8OQnT5VHJKOGehTxDEwXe2zGmTCSRgAvjyu9Yx0gjrrYndSdVpwC',
            'neptun_code' => 'AAA123',
            'department' =>'',
            'address_id' =>null,
            'role_id' =>'3',
        ]);
    }
}
        