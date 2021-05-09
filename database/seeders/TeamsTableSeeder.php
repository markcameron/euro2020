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
                    'code' => 'uy',
                ],
            ],
            'B' => [
                [
                    'name' => 'Belgium',
                    'code' => 'pt',
                ],
                [
                    'name' => 'Denmark',
                    'code' => 'es',
                ],
                [
                    'name' => 'Finland',
                    'code' => 'ma',
                ],
                [
                    'name' => 'Russia',
                    'code' => 'ir',
                ],
            ],
            'C' => [
                [
                    'name' => 'Austria',
                    'code' => 'fr',
                ],
                [
                    'name' => 'Netherlands',
                    'code' => 'au',
                ],
                [
                    'name' => 'North Macedonia',
                    'code' => 'pe',
                ],
                [
                    'name' => 'Ukraine',
                    'code' => 'dk',
                ],
            ],
            'D' => [
                [
                    'name' => 'Croatia',
                    'code' => 'ar',
                ],
                [
                    'name' => 'Czech Republic',
                    'code' => 'is',
                ],
                [
                    'name' => 'England',
                    'code' => 'hr',
                ],
                [
                    'name' => 'Scotland',
                    'code' => 'ng',
                ],
            ],
            'E' => [
                [
                    'name' => 'Poland',
                    'code' => 'br',
                ],
                [
                    'name' => 'Slovakia',
                    'code' => 'ch',
                ],
                [
                    'name' => 'Spain',
                    'code' => 'cr',
                ],
                [
                    'name' => 'Sweden',
                    'code' => 'rs',
                ],
            ],
            'F' => [
                [
                    'name' => 'France',
                    'code' => 'de',
                ],
                [
                    'name' => 'Germany',
                    'code' => 'mx',
                ],
                [
                    'name' => 'Hungary',
                    'code' => 'se',
                ],
                [
                    'name' => 'Portugal',
                    'code' => 'kr',
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
