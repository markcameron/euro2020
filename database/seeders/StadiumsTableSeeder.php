<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stadium;

class StadiumsTableSeeder extends Seeder
{

    public function run()
    {
        if (Stadium::count()) {
            return;
        }

        $stadiums = collect([
            [
                'name' => 'Wembley Stadium',
                'city' => 'London',
            ],
            [
                'name' => 'Stadio Olimpico',
                'city' => 'Rome',
            ],
            [
                'name' => 'Allianz Arena',
                'city' => 'Munich',
            ],
            [
                'name' => 'Olympic Stadium',
                'city' => 'Baku',
            ],
            [
                'name' => 'Krestovsky Stadium',
                'city' => 'Saint Petersburg',
            ],
            [
                'name' => 'Puskás Aréna',
                'city' => 'Budapest',
            ],
            [
                'name' => 'La Cartuja',
                'city' => 'Seville',
            ],
            [
                'name' => 'Arena Națională',
                'city' => 'Bucharest',
            ],
            [
                'name' => 'Johan Cruyff Arena',
                'city' => 'Amsterdam',
            ],
            [
                'name' => 'Hampden Park',
                'city' => 'Glasgow',
            ],
            [
                'name' => 'Parken Stadium',
                'city' => 'Copenhagen',
            ],
        ]);

        $stadiums->each(fn($stadium) => Stadium::create($stadium));
    }
}
