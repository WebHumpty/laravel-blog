<?php

namespace Database\Factories\Blogs;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogAuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-1 months', '-1 days');
        $name = $this->faker->unique()->name();

        return [
            'slug' => $this->faker->slug($name, '-'),
            'name' => $name,
            'email' => $this->faker->unique()->email(),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
