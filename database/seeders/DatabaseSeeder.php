<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Gian Sonia',
            'email' => 'giansonia555@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt(190318),
            'roles' => 'SUPER ADMIN', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Salfarizi',
            'email' => 'salfarizi@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('salfarizi32'), // password
            'roles' => 'SUPER ADMIN', // password
            'remember_token' => Str::random(10),
        ]);
    }
}
