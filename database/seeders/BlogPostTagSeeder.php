<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogPostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 567; $i++) {
            $data[] = [
                'blog_post_id' => mt_rand(1, 267),
                'blog_tag_id' => mt_rand(1, 15),
            ];
        }

        DB::table('blog_post_blog_tag')->insert($data);
    }
}
