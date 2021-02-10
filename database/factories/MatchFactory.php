<?php

namespace Database\Factories;

use App\Models\Match;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Match::class;

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
            'opponent_id' => $this->faker->unique()->randomDigitNotNull,
            'max_points' => $this->faker->numberBetween(1, 1000000),
            'time_limit' => $this->faker->numberBetween(1, 1440),
            'current_time' => $this->faker->time(),
            'current_round' => $this->faker->numberBetween(1, 1000000),
            'total_score' => $this->faker->numberBetween(1, 1000000),
            'opponent_total_score' => $this->faker->numberBetween(1, 1000000),
            'result' => $this->faker->regexify('[A-Za-z0-9]{20}'),
        ];
    }
}
