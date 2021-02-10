<?php

namespace Database\Factories;

use App\Models\Opponent;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpponentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Opponent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomDigitNotNull,
            'user_id' => User::factory(),
            'name' => $this->faker->name,
            'avatar' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'wins' => $this->faker->numberBetween(1, 1000000),
            'losses' => $this->faker->numberBetween(1, 1000000),
        ];
    }
}
