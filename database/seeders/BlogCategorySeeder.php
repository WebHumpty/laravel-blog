<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $date = date('Y-m-d H:i:s');

        for ($i = 1; $i <= 7; $i++) {
            $name = 'Категория ' . $i;
            $categories[] = [
                'slug' => Str::slug($name, '-'),
                'name' => $name,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', strtotime($date . "+{$i} hour")),
                'updated_at' => date('Y-m-d H:i:s', strtotime($date . "+{$i} hour")),
            ];
        }

        DB::table('blog_categories')->insert($categories);
    }
}
