<?php

namespace Database\Factories;

use App\Models\MatchScore;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatchScoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MatchScore::class;

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
            'match_id' => /* $this->faker->unique()->randomDigitNotNull */ 1,
            'round' => $this->faker->numberBetween(0, 1000000),
            'time' => $this->faker->time(),
            'round_total_score' => $this->faker->numberBetween(0, 1000000),
            'negative_score' => $this->faker->numberBetween(-1000000, 0),
            'additional_score' => $this->faker->numberBetween(0, 1000000),
            'cards_score' => $this->faker->numberBetween(0, 1000000),
            'opponent_score' => $this->faker->numberBetween(-1000000, 1000000),
            'pot' => $this->faker->regexify('[A-Za-z0-9]{3}'),
            'got' => $this->faker->regexify('[A-Za-z0-9]{3}'),
        ];
    }
}
