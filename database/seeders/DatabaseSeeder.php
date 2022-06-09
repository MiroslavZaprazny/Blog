<?php

namespace Database\Seeders;

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
        Post::factory(10)->create();
        User::factory(1)->create([
            'name' => 'mirko',
            'username' => 'mirko',
            'email' => 'mirko@email.com',
            'password' => 'mirko123',
            'picture' => 'pictures/JgZNvCOnuYsxYAkGgbSPj0DGtMqNIpuXYRC0Ehmp.jpg'
        ]);
    }
}
