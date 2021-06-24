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

        $games->each(fn ($game) => $this->removeAbilityToPredict($game));
        $games->each(fn ($game) => $this->updateGoals($game, $this->getLiveMatchGoals($game)));

        return 0;
    }

    private function getLiveGames(): Collection
    {
        return Game::whereBetween('date', [now()->sub('150 minutes'), now()])->get();
    }

    private function getLiveMatchGoals(Game $game): array
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => config('services.football_data_api.auth_token'),
        ])->get('http://api.football-data.org/v2/matches/'. $game->football_data_match_id);

        $match = $response->json();

        return $match['match']['goals'];
    }

    private function updateGoals(Game $game, array $goals): void
    {
        $goals = collect($goals);

        $game->goals()->delete();

        if ($goals->isEmpty()) {
            return;
        }

        $goals->each(fn($goal) => $game->goals()->create([
            'minute' => $goal['minute'],
            'scored_by' => $goal['scorer']['name'],
            'team' => $goal['team']['id'] === $game->teamHome->football_data_team_id ? 'home' : 'away',
        ]));
    }

    private function removeAbilityToPredict(Game $game): void
    {
        if ($game->started && $game->can_predict) {
            $game->update(['can_predict' => false]);
        }
    }
}
