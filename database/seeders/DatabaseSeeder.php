<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
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

        $user = User::factory()->create([
            'name'=> 'John Doe'
        ]);
        $user = User::factory()->create([
            'username'=> 'steve',
            'name' => 'steve',
            'email' => 'steve@steve.com',
            'password' => 'password',
            'admin_level' => 'admin'
        ]);

        $user = User::factory()->create([
            'username'=> 'Admin',
            'name' => 'UWS Admin',
            'email' => 'UWSAdmin@uws.com',
            'password' => 'SSSlaravel22',
            'admin_level' => 'admin'
        ]);

        $user = User::factory()->create([
            'username'=> 'Andrew',
            'name' => 'Andrew',
            'email' => 'testuser@test.com',
            'password' => 'Laraveltest22'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

    }
}
