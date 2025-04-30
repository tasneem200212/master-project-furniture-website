<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::insert([
            [
                'title'        => 'Modern Chair Design',
                'content'      => 'Content of the article...',
                'category'     => 'Chair Design',
                'author'       => 'Alex Manie',
                'published_at' => '2024-01-07',
                'image_path'   => 'assets/imgs/furniture/blog/blog-image1.jpg',
            ],
            [
                'title'        => 'Sofa Design Trends',
                'content'      => 'Content of the article...',
                'category'     => 'Sofa Design',
                'author'       => 'Jane Doe',
                'published_at' => '2024-02-15',
                'image_path'   => 'assets/imgs/furniture/blog/blog-image2.jpg',
            ],
            // Add more posts as needed
        ]);
    }
}
