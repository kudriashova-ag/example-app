<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin'
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Test 1',
            'description' => 'description 1',
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Test 2',
            'description' => 'description 2',
        ]);

        \App\Models\Product::factory(10)->create();

        \App\Models\Tag::factory(10)->create();
    }
}
