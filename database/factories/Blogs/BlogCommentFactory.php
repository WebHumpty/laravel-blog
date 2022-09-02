<?php

namespace Database\Factories\Blogs;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-1 months', '-1 days');

        return [
            'user_id' => mt_rand(0, 10),
            'blog_post_id' => mt_rand(1, 40),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'comment' => $this->faker->words(mt_rand(10, 25), true),
            'is_active' => 1,
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
