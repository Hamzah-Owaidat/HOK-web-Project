<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run()
    {
        $games = [
            ['game_name' => 'Sudoku', 'description' => 'A classic puzzle game.', 'difficulty' => 'Medium'],
            ['game_name' => 'Minesweeper', 'description' => 'A strategic game where you clear mines.', 'difficulty' => 'Hard']
        ];

        foreach ($games as $game) {
            Game::firstOrCreate(['game_name' => $game['game_name']], $game);
        }
    }

}
