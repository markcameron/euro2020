<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Stadium;
use App\Models\Team;
use Carbon\Carbon;

class GamesTableSeeder extends Seeder
{

    public function run()
    {
        if (Game::count()) {
            return;
        }

        $timezone = 'Europe/Zurich';

        $teams = Team::get();
        $stadiums = Stadium::get();
        $matches = collect([
            // Round 1
            // 11th June
            [
                'home_team_id' => $teams->where('name', 'Turkey')->first()->id,
                'away_team_id' => $teams->where('name', 'Italy')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Rome')->first()->id,
                'date' => Carbon::create(2021, 6, 11, 21, 0, 0, $timezone)->toDateTimeString(),
            ],

            // 13th June
            [
                'home_team_id' => $teams->where('name', 'Wales')->first()->id,
                'away_team_id' => $teams->where('name', 'Switzerland')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Baku')->first()->id,
                'date' => Carbon::create(2021, 6, 12, 15, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Denmark')->first()->id,
                'away_team_id' => $teams->where('name', 'Finland')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Copenhagen')->first()->id,
                'date' => Carbon::create(2021, 6, 12, 18, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Belgium')->first()->id,
                'away_team_id' => $teams->where('name', 'Russia')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Saint Petersburg')->first()->id,
                'date' => Carbon::create(2021, 6, 12, 21, 0, 0, $timezone)->toDateTimeString(),
            ],

            // 13th June
            [
                'home_team_id' => $teams->where('name', 'England')->first()->id,
                'away_team_id' => $teams->where('name', 'Croatia')->first()->id,
                'stadium_id' => $stadiums->where('city', 'London')->first()->id,
                'date' => Carbon::create(2021, 6, 13, 15, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Austria')->first()->id,
                'away_team_id' => $teams->where('name', 'North Macedonia')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Bucharest')->first()->id,
                'date' => Carbon::create(2021, 6, 13, 18, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Netherlands')->first()->id,
                'away_team_id' => $teams->where('name', 'Ukraine')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Amsterdam')->first()->id,
                'date' => Carbon::create(2021, 6, 13, 21, 0, 0, $timezone)->toDateTimeString(),
            ],

            // 14th June
            [
                'home_team_id' => $teams->where('name', 'Scotland')->first()->id,
                'away_team_id' => $teams->where('name', 'Czech Republic')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Glasgow')->first()->id,
                'date' => Carbon::create(2021, 6, 14, 15, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Poland')->first()->id,
                'away_team_id' => $teams->where('name', 'Slovakia')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Saint Petersburg')->first()->id,
                'date' => Carbon::create(2021, 6, 14, 18, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Spain')->first()->id,
                'away_team_id' => $teams->where('name', 'Sweden')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Seville')->first()->id,
                'date' => Carbon::create(2021, 6, 14, 21, 0, 0, $timezone)->toDateTimeString(),
            ],

            // 15th June
            [
                'home_team_id' => $teams->where('name', 'Hungary')->first()->id,
                'away_team_id' => $teams->where('name', 'Portugal')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Budapest')->first()->id,
                'date' => Carbon::create(2021, 6, 15, 15, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'France')->first()->id,
                'away_team_id' => $teams->where('name', 'Germany')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Munich')->first()->id,
                'date' => Carbon::create(2021, 6, 15, 18, 0, 0, $timezone)->toDateTimeString(),
            ],

            // 16th June
            [
                'home_team_id' => $teams->where('name', 'Finland')->first()->id,
                'away_team_id' => $teams->where('name', 'Russia')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Saint Petersburg')->first()->id,
                'date' => Carbon::create(2021, 6, 16, 15, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Turkey')->first()->id,
                'away_team_id' => $teams->where('name', 'Wales')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Baku')->first()->id,
                'date' => Carbon::create(2021, 6, 16, 18, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Italy')->first()->id,
                'away_team_id' => $teams->where('name', 'Switzerland')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Rome')->first()->id,
                'date' => Carbon::create(2021, 6, 16, 21, 0, 0, $timezone)->toDateTimeString(),
            ],

            // 16th June
            [
                'home_team_id' => $teams->where('name', 'Ukraine')->first()->id,
                'away_team_id' => $teams->where('name', 'North Macedonia')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Bucharest')->first()->id,
                'date' => Carbon::create(2021, 6, 17, 15, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Denmark')->first()->id,
                'away_team_id' => $teams->where('name', 'Belgium')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Copenhagen')->first()->id,
                'date' => Carbon::create(2021, 6, 17, 18, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Netherlands')->first()->id,
                'away_team_id' => $teams->where('name', 'Austria')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Amsterdam')->first()->id,
                'date' => Carbon::create(2021, 6, 17, 21, 0, 0, $timezone)->toDateTimeString(),
            ],

            // 17th June
            [
                'home_team_id' => $teams->where('name', 'Sweden')->first()->id,
                'away_team_id' => $teams->where('name', 'Slovakia')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Saint Petersburg')->first()->id,
                'date' => Carbon::create(2021, 6, 18, 15, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Croatia')->first()->id,
                'away_team_id' => $teams->where('name', 'Czech Republic')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Glasgow')->first()->id,
                'date' => Carbon::create(2021, 6, 18, 18, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'England')->first()->id,
                'away_team_id' => $teams->where('name', 'Scotland')->first()->id,
                'stadium_id' => $stadiums->where('city', 'London')->first()->id,
                'date' => Carbon::create(2021, 6, 18, 21, 0, 0, $timezone)->toDateTimeString(),
            ],

            // 19th June
            [
                'home_team_id' => $teams->where('name', 'Hungary')->first()->id,
                'away_team_id' => $teams->where('name', 'France')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Budapest')->first()->id,
                'date' => Carbon::create(2021, 6, 19, 15, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Portugal')->first()->id,
                'away_team_id' => $teams->where('name', 'Germany')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Munich')->first()->id,
                'date' => Carbon::create(2021, 6, 19, 18, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Spain')->first()->id,
                'away_team_id' => $teams->where('name', 'Poland')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Seville')->first()->id,
                'date' => Carbon::create(2021, 6, 19, 21, 0, 0, $timezone)->toDateTimeString(),
            ],

            // 20th June
            [
                'home_team_id' => $teams->where('name', 'Italy')->first()->id,
                'away_team_id' => $teams->where('name', 'Wales')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Rome')->first()->id,
                'date' => Carbon::create(2021, 6, 20, 18, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Switzerland')->first()->id,
                'away_team_id' => $teams->where('name', 'Turkey')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Baku')->first()->id,
                'date' => Carbon::create(2021, 6, 20, 18, 0, 0, $timezone)->toDateTimeString(),
            ],

            // 21st June
            [
                'home_team_id' => $teams->where('name', 'Ukraine')->first()->id,
                'away_team_id' => $teams->where('name', 'Austria')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Bucharest')->first()->id,
                'date' => Carbon::create(2021, 6, 21, 18, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'North Macedonia')->first()->id,
                'away_team_id' => $teams->where('name', 'Netherlands')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Amsterdam')->first()->id,
                'date' => Carbon::create(2021, 6, 21, 18, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Finland')->first()->id,
                'away_team_id' => $teams->where('name', 'Belgium')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Saint Petersburg')->first()->id,
                'date' => Carbon::create(2021, 6, 21, 21, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Russia')->first()->id,
                'away_team_id' => $teams->where('name', 'Denmark')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Copenhagen')->first()->id,
                'date' => Carbon::create(2021, 6, 21, 21, 0, 0, $timezone)->toDateTimeString(),
            ],

            // 22nd June
            [
                'home_team_id' => $teams->where('name', 'Czech Republic')->first()->id,
                'away_team_id' => $teams->where('name', 'England')->first()->id,
                'stadium_id' => $stadiums->where('city', 'London')->first()->id,
                'date' => Carbon::create(2021, 6, 22, 18, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Croatia')->first()->id,
                'away_team_id' => $teams->where('name', 'Scotland')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Glasgow')->first()->id,
                'date' => Carbon::create(2021, 6, 2, 18, 0, 0, $timezone)->toDateTimeString(),
            ],

            // 21st June
            [
                'home_team_id' => $teams->where('name', 'Sweden')->first()->id,
                'away_team_id' => $teams->where('name', 'Poland')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Saint Petersburg')->first()->id,
                'date' => Carbon::create(2021, 6, 23, 18, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Slovakia')->first()->id,
                'away_team_id' => $teams->where('name', 'Spain')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Seville')->first()->id,
                'date' => Carbon::create(2021, 6, 23, 18, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Germany')->first()->id,
                'away_team_id' => $teams->where('name', 'Hungary')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Munich')->first()->id,
                'date' => Carbon::create(2021, 6, 23, 21, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Portugal')->first()->id,
                'away_team_id' => $teams->where('name', 'France')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Budapest')->first()->id,
                'date' => Carbon::create(2021, 6, 23, 21, 0, 0, $timezone)->toDateTimeString(),
            ],

        ]);

        $matches->each(fn($match) => Game::create($match));
    }
}
