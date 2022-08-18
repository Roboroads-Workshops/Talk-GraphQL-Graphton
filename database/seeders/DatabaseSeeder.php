<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Post;
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
         User::factory()->count(random_int(1000, 1200))->create();

         Post::factory()
             ->count(random_int(201, 250))
             ->sequence(fn ($sequence) => [
                 'user_id' => User::query()->inRandomOrder()->first()->id
             ])
             ->has(
                 Comment::factory()
                     ->count(random_int(1,50))
                     ->state(function (array $attributes, Post $post) {
                         return ['user_id' => User::query()->inRandomOrder()->first()->id];
                     })
             )
             ->create();
    }
}
