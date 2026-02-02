<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            'President',
            'Vice-President',
            'Secretary',
            'Tresurer',
            'Member',
        ];

        foreach($posts as $post) {
            Post::create(['name' => $post]);
        }
    }
}
