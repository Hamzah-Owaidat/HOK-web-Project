<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Score;
use App\Models\User;
use App\Models\Game;
use Faker\Factory as FakerFactory;

class ScoreSeeder extends Seeder
{
    public function run()
    {
        $faker = FakerFactory::create();

        // Ensure users and games are created
        if (User::count() == 0) {
            $this->call(UserSeeder::class);
        }

        if (Game::count() == 0) {
            $this->call(GameSeeder::class);
        }

        // Fetch all user and game IDs
        $userIds = User::all()->pluck('id')->toArray();
        $gameIds = Game::all()->pluck('id')->toArray();

        // Create 100 scores
        foreach (range(1, 100) as $index) {
            Score::create([
                'user_id' => $faker->randomElement($userIds),
                'game_id' => $faker->randomElement($gameIds),
                'score' => rand(100, 1000),
                'date_played' => $faker->dateTimeBetween('-30 days', 'now'),
            ]);
        }
    }
}
