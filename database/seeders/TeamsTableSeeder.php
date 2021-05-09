<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Group;

class TeamsTableSeeder extends Seeder
{

    public function run()
    {
        if (Team::count()) {
            return;
        }

        $teams = [
            'A' => [
                [
                    'name' => 'Italy',
                    'code' => 'it',
                ],
                [
                    'name' => 'Switzerland',
                    'code' => 'ch',
                ],
                [
                    'name' => 'Turkey',
                    'code' => 'tr',
                ],
                [
                    'name' => 'Wales',
                    'code' => 'gb-wls',
                ],
            ],
            'B' => [
                [
                    'name' => 'Belgium',
                    'code' => 'be',
                ],
                [
                    'name' => 'Denmark',
                    'code' => 'dk',
                ],
                [
                    'name' => 'Finland',
                    'code' => 'fi',
                ],
                [
                    'name' => 'Russia',
                    'code' => 'ru',
                ],
            ],
            'C' => [
                [
                    'name' => 'Austria',
                    'code' => 'at',
                ],
                [
                    'name' => 'Netherlands',
                    'code' => 'nl',
                ],
                [
                    'name' => 'North Macedonia',
                    'code' => 'mk',
                ],
                [
                    'name' => 'Ukraine',
                    'code' => 'ua',
                ],
            ],
            'D' => [
                [
                    'name' => 'Croatia',
                    'code' => 'hr',
                ],
                [
                    'name' => 'Czech Republic',
                    'code' => 'cz',
                ],
                [
                    'name' => 'England',
                    'code' => 'gb-eng',
                ],
                [
                    'name' => 'Scotland',
                    'code' => 'gb-sct',
                ],
            ],
            'E' => [
                [
                    'name' => 'Poland',
                    'code' => 'pl',
                ],
                [
                    'name' => 'Slovakia',
                    'code' => 'sk',
                ],
                [
                    'name' => 'Spain',
                    'code' => 'es',
                ],
                [
                    'name' => 'Sweden',
                    'code' => 'se',
                ],
            ],
            'F' => [
                [
                    'name' => 'France',
                    'code' => 'fr',
                ],
                [
                    'name' => 'Germany',
                    'code' => 'de',
                ],
                [
                    'name' => 'Hungary',
                    'code' => 'hu',
                ],
                [
                    'name' => 'Portugal',
                    'code' => 'pt',
                ],
            ],
        ];

        foreach ($teams as $group => $teams) {
            $group = Group::whereName($group)->first();

            foreach ($teams as $team) {
                $team = Team::create(
                    [
                        'name' => $team['name'],
                        'code' => $team['code'],
                        'group_id' => $group->id,
                    ]
                );
            }
        }
    }
}
