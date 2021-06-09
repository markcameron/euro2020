<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use App\Models\Game;
use Carbon\Carbon;

class FetchMatchId extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fd:match-id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the match IDs from Football Data API';

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
        ])->get('http://api.football-data.org/v2/competitions/2018/matches');

        $matches = collect($response->json()['matches']);

        $matches->each(function (array $match) {
            $time = Carbon::parse($match['utcDate']);

            $games = Game::where('date', $time->timezone('Europe/Zurich')->toDateTimeString())->get();

            $games->each(function ($game) use ($match) {
                if (!is_null($game->football_data_match_id)) {
                    return;
                }

                if ($game->teamHome->football_data_team_id === $match['homeTeam']['id']
                    && $game->teamAway->football_data_team_id === $match['awayTeam']['id']
                ) {
                    $game->update(['football_data_match_id' => $match['id']]);
                }
            });
        });

        return 0;
    }
}
