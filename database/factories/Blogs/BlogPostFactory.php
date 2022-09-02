<?php

namespace Database\Factories\Blogs;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->words(mt_rand(2, 4), true);

        $images = [
            1 => 'blogs/18-08-2022/18/blog-1.jpg',
            'blogs/18-08-2022/18/blog-2.jpg',
            'blogs/18-08-2022/18/blog-3.jpg',
            'blogs/18-08-2022/18/blog-4.jpg',
            'blogs/18-08-2022/18/blog-5.jpg',
        ];

        $thumbnail = $images[mt_rand(1, 5)];

        $text = '<p>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                    tevidulabore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et
                    justo duo dolores rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                    ipsum dolor sit am Lorem ipsum dolor sitconsetetur sadipscing elitr, sed diam nonumy
                    eirmod tempor invidunt ut labore et dolore maliquyam erat, sed diam voluptua.
                </p>';
        $paragraphs = '';
        for ($i = 0; $i <= mt_rand(2, 4); $i++) {
            $paragraphs .= $text;
        }

        $date = $this->faker->dateTimeBetween('-1 months', '-1 days');

        return [
            'blog_category_id' => mt_rand(1, 7),
            'blog_author_id' => mt_rand(1, 10),
            'keywords' => $this->faker->words(mt_rand(1, 3), true),
            'description' => $this->faker->words(mt_rand(8, 18), true),
            'slug' => $this->faker->slug($title, '-'),
            'title' => $title,
            'content' => $paragraphs,
            'thumbnail' => $thumbnail,
            'is_published' => mt_rand(1, 7) > 1,
            'views' => 0,
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
