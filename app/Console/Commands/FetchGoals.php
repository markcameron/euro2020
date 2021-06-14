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
        $games = $this->getLiveGames();

        $games->each(function ($game) {
            $match = $this->getLiveMatchData($game);
            $this->updateGoals($game, $match['match']['goals']);
        });

        return 0;
    }

    private function getLiveGames(): Collection
    {
        return Game::whereBetween('date', [now()->sub('150 minutes'), now()])->get();
    }

    private function getLiveMatchData(Game $game): array
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => config('services.football_data_api.auth_token'),
        ])->get('http://api.football-data.org/v2/matches/'. $game->football_data_match_id);

        return $response->json();
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
