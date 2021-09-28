<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Post;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory(10)->create();

        User::factory(20)->create()->each(function($user) use ($tags){
            Post::factory(rand(1,4))->create([
                'user_id' =>$user->id
            ])->each(function($posts) use ($tags)
            {
                $posts->tags()->attach($tags->random(2));
            });
        });
    }
}
