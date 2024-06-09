<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    protected $model = Game::class;

    public function definition()
    {
        $games = ['Sudoku', 'Minesweeper'];

        return [
            'game_name' => $this->faker->randomElement($games),
            'description' => $this->faker->sentence,
            'difficulty' => $this->faker->randomElement(['Easy', 'Medium', 'Hard']),
        ];
    }
}
