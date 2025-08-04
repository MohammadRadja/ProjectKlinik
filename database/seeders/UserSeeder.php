<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'superuser',
                'email' => 'dewa17a@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('admin321'),
                'remember_token' => '2',
                'created_at' => '2022-06-29 13:16:09',
                'updated_at' => '2022-06-29 13:18:58',
                'username' => 'admin',
                'role_id' => 3,
                'telp' => null,
                'alamat' => null,
                'user_id' => null,
                'tanggal_lahir' => null,
                'password_change_date' => null,
            ],
            [
                'id' => 2,
                'name' => 'Adi Wielijarni',
                'email' => 'superuser@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('perawat123'),
                'remember_token' => null,
                'created_at' => '2022-06-29 14:28:31',
                'updated_at' => '2022-07-01 15:22:31',
                'username' => 'superuser',
                'role_id' => 3,
                'telp' => '123123',
                'alamat' => '12312312',
                'user_id' => null,
                'tanggal_lahir' => '2022-07-01',
                'password_change_date' => '2022-07-01 15:22:31',
            ],
            [
                'id' => 3,
                'name' => 'tes',
                'email' => 'tes@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('dokter123'),
                'remember_token' => null,
                'created_at' => '2022-06-29 17:13:10',
                'updated_at' => '2022-06-29 17:13:10',
                'username' => 'P0001',
                'role_id' => 2,
                'telp' => '2323',
                'alamat' => '23232',
                'user_id' => 'P0001',
                'tanggal_lahir' => '2022-06-21',
                'password_change_date' => null,
            ],
            [
                'id' => 4,
                'name' => 'deni',
                'email' => 'deni@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('dokter321'),
                'remember_token' => null,
                'created_at' => '2022-06-29 17:14:05',
                'updated_at' => '2022-07-02 13:52:31',
                'username' => 'P0002',
                'role_id' => 2,
                'telp' => '23232',
                'alamat' => '323232',
                'user_id' => 'P0002',
                'tanggal_lahir' => '2022-06-16',
                'password_change_date' => '2022-07-02 13:52:31',
            ],
        ]);
    }
}
