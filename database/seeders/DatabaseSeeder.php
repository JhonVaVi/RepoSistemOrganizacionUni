<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Test User',
            'email' => 'admin@admin.admin',
            'password' => bcrypt('123456789')
        ]);
        Teacher::create([
            'name' => 'Luis',
            'surname' => 'Otero',
            'nickname' => 'El todo poderoso Oterito',
        ]);
    }
}
