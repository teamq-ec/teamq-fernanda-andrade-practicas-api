<?php

namespace Database\Factories;

use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title(),
            'description' => fake()->text(),
            'adult' => fake()->boolean(),
            'release_date_at' => fake()->date(),
            'genre_id' => Genre::all()->random()->id,
            'director_id' => Director::all()->random()->id
        ];
    }
}
