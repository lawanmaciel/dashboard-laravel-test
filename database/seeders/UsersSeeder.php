<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin@test.com'),
            'permission_id' => 1
        ]);

        User::create([
            'name' => 'Comum',
            'email' => 'comum@test.com',
            'password' => Hash::make('comum@test.com'),
            'permission_id' => 2
        ]);
    }
}
