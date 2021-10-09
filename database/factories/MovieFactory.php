<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    /**
     * @inheritDoc
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'status' => $this->faker->randomElement([Movie::STATUS_RENTED, Movie::STATUS_FREE]),
            'type' => $this->faker->randomElement([Movie::TYPE_NEW_RELEASE, Movie::TYPE_OLDIE, Movie::TYPE_NORMAL]),
        ];
    }
}
