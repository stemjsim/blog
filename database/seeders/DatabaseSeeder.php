<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
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
            'username'=> 'andrew',
            'name' => 'andrew',
            'email' => 'andrew@andrew.com',
            'password' => 'password'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

    }
}
