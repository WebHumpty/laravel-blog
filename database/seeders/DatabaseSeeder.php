<?php

namespace Database\Seeders;

use App\Models\Blogs\BlogAuthor;
use App\Models\Blogs\BlogComment;
use App\Models\Blogs\BlogPost;
use App\Models\Blogs\BlogTag;
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
        \App\Models\User::factory(10)->create();
        BlogAuthor::factory(10)->create();
        $this->call(BlogCategorySeeder::class);
        BlogPost::factory(267)->create();
        BlogTag::factory(15)->create();
        $this->call(BlogPostTagSeeder::class);
        BlogComment::factory(137)->create();
    }
}
