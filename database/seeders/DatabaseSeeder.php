<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'sample@example.com',
        ]);

        $categories = \App\Models\Category::factory(5)->create();

        $tags = \App\Models\Tag::factory(10)->create();

        \App\Models\Post::factory(50)
            ->recycle($categories)
            ->create()
            ->each(function ($post) use ($tags) {
                $post
                ->tags()
                ->attach($tags->random(random_int(1, 3)));
            });
    }
}
