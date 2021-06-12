<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

use App\Models\Game;
use Carbon\Carbon;
use Log;

class FetchGoals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fd:goals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the goals for a given match from Football Data API';

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
        // Find live match
        $games = $this->getLiveGames();

        // Query match status
        $games->each(function ($game) {
            $response = Http::withHeaders([
                'X-Auth-Token' => config('services.football_data_api.auth_token'),
            ])->get('http://api.football-data.org/v2/matches/'. $game->football_data_match_id);

            $match = $response->json();

            $this->updateGoals($game, $match['match']['goals']);
        });

        return 0;
    }

    private function getLiveGames(): Collection
    {
        $games = Game::whereBetween('date', [now()->sub('240 minutes'), now()])->get();

        if ($games->isEmpty()) {
            Log::info('No live games');
        } else {
            $games->each(fn ($game) => Log::info('Found game: '. $game->id .' | '. $game->date .' | '. $game->teamHome->name .' | '. $game->teamAway->name));
        }

        return $games;
    }

    private function updateGoals(Game $game, array $goals): void
    {
        $goals = collect($goals);

        if ($goals->isEmpty()) {
            return;
        }

        $game->goals()->delete();

        $goals->each(fn($goal) => $game->goals()->create([
            'minute' => $goal['minute'],
            'scored_by' => $goal['scorer']['name'],
            'team' => $goal['team']['id'] === $game->teamHome->football_data_team_id ? 'home' : 'away',
        ]));
    }
}
