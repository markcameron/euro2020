<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use App\Models\Team;

class FetchTeamId extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fd:team-id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the team IDs from Football Data API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => config('services.football_data_api.auth_token'),
        ])->get('http://api.football-data.org/v2/competitions/2018/teams');

        $teams = collect($response->json()['teams']);

        $teams->each(function (array $team) {
            $local_team = Team::where('name', $team['name'])->first();

            if ($local_team) {
                $local_team->update(['football_data_team_id' => $team['id']]);
            }
        });
        return 0;
    }
}
