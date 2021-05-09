<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupsTableSeeder extends Seeder
{

    public function run()
    {
        if (Group::count()) {
            return;
        }

        $groups = collect([
            'A', 'B', 'C', 'D', 'E', 'F',
        ]);

        $groups->each(fn($group) => Group::create([
            'name' => $group,
        ]));
    }
}
