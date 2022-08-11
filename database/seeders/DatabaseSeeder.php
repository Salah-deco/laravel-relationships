<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\UserFactory;
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
        $userFactory = new UserFactory();
        $userFactory->create();
        $userFactory->create();
        $userFactory->create();

        \App\Models\Address::create([
            'uid' => 1,
            'country' => 'USA'
        ]);
        \App\Models\Address::create([
            'uid' => 3,
            'country' => 'UK'
        ]);
        \App\Models\Address::create([
            'uid' => 2,
            'country' => 'Morocco'
        ]);

        \App\Models\Post::create([
            'title' => 'First Post',
            'user_id' => 1
        ]);
        \App\Models\Post::create([
            'title' => 'Second Post',
            'user_id' => 1
        ]);
        \App\Models\Post::create([
            'title' => 'Third Post',
            'user_id' => 1
        ]);
        \App\Models\Post::create([
            'title' => 'Post 2',
            'user_id' => 2
        ]); 
        \App\Models\Post::create([
            'title' => 'Post 3',
            'user_id' => 3
        ]);

        \App\Models\Post::create([
            'title' => 'Post by Guest',
        ]);
    }
}
