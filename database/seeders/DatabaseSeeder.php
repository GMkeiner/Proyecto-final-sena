<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            'name' => 'Administrador',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('admin12345'),
        ]);
        $this->call([
            RoleSeeder::class
        ]);
    }
}
