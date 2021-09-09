<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {        
        Post::truncate();
        User::truncate();
        Category::truncate();
 
     /*   $user = User::factory()->create([
           'name' => 'Mary K.'
       ]); */
       // Category::factory()->create();
        Post::factory(5)->create([
            
        ]);
       
    }
}
