<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(200),
            'photo' => $this->faker->imageUrl($width = 400, $height = 400),
            'ticket_price' => $this->faker->randomFloat(2, 0, 100),
            'rating' => 0,
            'release_year' => $this->faker->year(),
            'video' => '/video/video.mp4',
        ];
    }
}
