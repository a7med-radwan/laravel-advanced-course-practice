<?php

namespace Database\Seeders;

use App\Models\Insurance;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Post::truncate();
        Tag::truncate();
        User::truncate();
        Insurance::truncate();
        Comment::truncate();
        Post::factory(10)->create();
        Tag::factory(10)->create();
        Comment::factory(3)->create();


        // Add 3 users and 2 insurances, link first and third users to insurances
        $users = User::factory(3)->create();
        $posts = Post::factory(3)->create();
        Insurance::factory()->create(['user_id' => $users[0]->id]);
        Insurance::factory()->create(['user_id' => $users[2]->id]);
        Comment::factory()->create(['user_id' => $users[2]->id, 'post_id' => $posts[1]->id]);
        Comment::factory()->create(['user_id' => $users[2]->id, 'post_id' => $posts[2]->id]);
        Comment::factory()->create(['user_id' => $users[1]->id, 'post_id' => $posts[1]->id]);
    }
}