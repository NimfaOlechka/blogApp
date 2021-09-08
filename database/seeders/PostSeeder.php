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
        //seeding
        Post::table('posts')->insert([
        'title' => 'My First Post',
        'slug' => 'my-first-post',
        'excerpt' => 'My amazing first post',
        'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi viverra urna vitae condimentum consectetur. Cras sodales porttitor ligula, id dignissim nulla congue in. Duis faucibus nulla eget placerat finibus. Ut ornare neque id leo hendrerit, a semper sapien aliquet. Aliquam a enim ac velit fermentum tincidunt non vehicula lorem. Vestibulum et pharetra lacus. Duis laoreet nunc lectus, et volutpat odio facilisis id. Maecenas id tortor a velit sodales tristique nec auctor nisl. Praesent elit sem, sagittis non 
mattis id, porta quis tellus. Nam vehicula, purus sed iaculis condimentum, orci ipsum viverra lectus, vitae facilisis orci ante sit amet metus. Suspendisse porta maximus metus at lacinia. Fusce blandit libero lectus.</p>'
        ]);
    }
}
