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
            // 12th June
            [
                'home_team_id' => $teams->where('name', 'Turkey')->first()->id,
                'away_team_id' => $teams->where('name', 'Italy')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Rome')->first()->id,
                'date' => Carbon::create(2021, 6, 12, 21, 0, 0, $timezone)->toDateTimeString(),
            ],

            // // 13th June
            [
                'home_team_id' => $teams->where('name', 'Wales')->first()->id,
                'away_team_id' => $teams->where('name', 'Switzerland')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Baku')->first()->id,
                'date' => Carbon::create(2021, 6, 13, 15, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Denmark')->first()->id,
                'away_team_id' => $teams->where('name', 'Finland')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Copenhagen')->first()->id,
                'date' => Carbon::create(2021, 6, 13, 18, 0, 0, $timezone)->toDateTimeString(),
            ],
            [
                'home_team_id' => $teams->where('name', 'Belgium')->first()->id,
                'away_team_id' => $teams->where('name', 'Russia')->first()->id,
                'stadium_id' => $stadiums->where('city', 'Saint Petersburg')->first()->id,
                'date' => Carbon::create(2021, 6, 13, 21, 0, 0, $timezone)->toDateTimeString(),
            ],

            // // 16th June
            // [
            //     'home_team_id' => $teams->where('name', 'France')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Australia')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Kazan Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 16, 13, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Peru')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Denmark')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Mordovia Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 16, 19, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Argentina')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Iceland')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Otkritie Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 16, 16, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Croatia')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Nigeria')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Kaliningrad Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 16, 21, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],

            // // 17th June
            // [
            //     'home_team_id' => $teams->where('name', 'Costa Rica')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Serbia')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Cosmos Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 17, 16, 0, 0, 4)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Brazil')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Switzerland')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Rostov Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 17, 21, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Germany')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Mexico')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Luzhniki Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 17, 18, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],

            // // 18th June
            // [
            //     'home_team_id' => $teams->where('name', 'Sweden')->first()->id,
            //     'away_team_id' => $teams->where('name', 'South Korea')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Luzhniki Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 18, 15, 0, 0, 4)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Belgium')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Panama')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Fisht Olympic Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 18, 18, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Tunisia')->first()->id,
            //     'away_team_id' => $teams->where('name', 'England')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Volgograd Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 18, 21, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],

            // // 19th June
            // [
            //     'home_team_id' => $teams->where('name', 'Colombia')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Japan')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Mordovia Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 19, 15, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Poland')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Senegal')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Otkritie Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 19, 18, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],

            // // Round 2
            // [
            //     'home_team_id' => $teams->where('name', 'Russia')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Egypt')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Krestovsky Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 19, 21, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],

            // // 20th June
            // [
            //     'home_team_id' => $teams->where('name', 'Uruguay')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Saudi Arabia')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Rostov Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 20, 18, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Portugal')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Morocco')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Luzhniki Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 20, 15, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Iran')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Spain')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Kazan Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 20, 21, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],

            // // 21st June
            // [
            //     'home_team_id' => $teams->where('name', 'Denmark')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Australia')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Cosmos Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 21, 16, 0, 0, 4)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'France')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Peru')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Central Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 21, 19, 0, 0, 4)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Argentina')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Croatia')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Nizhny Novgorod Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 21, 21, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],

            // // 22nd June
            // [
            //     'home_team_id' => $teams->where('name', 'Nigeria')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Iceland')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Volgograd Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 22, 18, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Brazil')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Costa Rica')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Krestovsky Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 22, 15, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Serbia')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Switzerland')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Kaliningrad Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 22, 20, 0, 0, 2)->timezone('UTC')->toDateTimeString(),
            // ],

            // // 23rd June
            // [
            //     'home_team_id' => $teams->where('name', 'South Korea')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Mexico')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Rostov Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 23, 18, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Germany')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Sweden')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Fisht Olympic Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 23, 21, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Belgium')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Tunisia')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Otkritie Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 23, 15, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],

            // // 24th June
            // [
            //     'home_team_id' => $teams->where('name', 'England')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Panama')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Nizhny Novgorod Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 24, 15, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Japan')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Senegal')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Central Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 24, 19, 0, 0, 4)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Poland')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Colombia')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Kazan Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 24, 21, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],

            // // Round 3

            // // 25th June
            // [
            //     'home_team_id' => $teams->where('name', 'Uruguay')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Russia')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Cosmos Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 25, 18, 0, 0, 4)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Saudi Arabia')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Egypt')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Volgograd Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 25, 17, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Iran')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Portugal')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Mordovia Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 25, 21, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Spain')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Morocco')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Kazan Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 25, 20, 0, 0, 2)->timezone('UTC')->toDateTimeString(),
            // ],

            // // 26th June
            // [
            //     'home_team_id' => $teams->where('name', 'Denmark')->first()->id,
            //     'away_team_id' => $teams->where('name', 'France')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Luzhniki Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 26, 17, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Australia')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Peru')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Fisht Olympic Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 26, 17, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Nigeria')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Argentina')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Krestovsky Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 26, 21, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Iceland')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Croatia')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Rostov Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 26, 21, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],

            // // 27th June
            // [
            //     'home_team_id' => $teams->where('name', 'Serbia')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Brazil')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Otkritie Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 27, 21, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Switzerland')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Costa Rica')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Nizhny Novgorod Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 27, 21, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'South Korea')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Germany')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Kazan Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 27, 17, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Mexico')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Sweden')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Central Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 27, 18, 0, 0, 4)->timezone('UTC')->toDateTimeString(),
            // ],

            // // 28th June
            // [
            //     'home_team_id' => $teams->where('name', 'England')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Belgium')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Kaliningrad Stadium')->first()->id,
            //     'date' => Carbon::create(2021, 6, 28, 20, 0, 0, 2)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Panama')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Tunisia')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Mordovia Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 28, 21, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Japan')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Poland')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Volgograd Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 28, 17, 0, 0, 3)->timezone('UTC')->toDateTimeString(),
            // ],
            // [
            //     'home_team_id' => $teams->where('name', 'Senegal')->first()->id,
            //     'away_team_id' => $teams->where('name', 'Colombia')->first()->id,
            //     'stadium_id' => $stadiums->where('name', 'Cosmos Arena')->first()->id,
            //     'date' => Carbon::create(2021, 6, 28, 18, 0, 0, 4)->timezone('UTC')->toDateTimeString(),
            // ],

        ]);

        $matches->each(fn($match) => Game::create($match));
    }
}
