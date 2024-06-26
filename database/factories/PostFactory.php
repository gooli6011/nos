<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'user_id' => $this->faker->numberBetween(1,12),
			'image' => $this->faker->imageUrl,
			'title' => $this->faker->title,
			'body' => $this->faker->text
		];
	}
}
