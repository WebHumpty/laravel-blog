<?php

namespace Database\Factories\Blogs;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->word();

        return [
            'slug' => $this->faker->slug($name, '-'),
            'name' => $name,
        ];
    }
}
