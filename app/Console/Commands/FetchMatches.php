<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

use App\Models\Game;
use App\Models\Stadium;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;

class FetchMatches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fd:matches';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the matches from Football Data API';

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
        User::where('can_predict', false)->update(['can_predict' => true]);
        Game::whereIn('stage', ['GROUP_STAGE'])->update(['can_predict' => false]);

        $matches = $this->getMatches();

        $matches->where('stage', 'LAST_16')->each($this->insertMatch());
        $matches->where('stage', 'QUARTER_FINAL')->each($this->insertMatch());
        $matches->where('stage', 'SEMI_FINAL')->each($this->insertMatch());
        $matches->where('stage', 'FINAL')->each($this->insertMatch());

        return 0;
    }

    private function getMatches(): Collection
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => config('services.football_data_api.auth_token'),
        ])->get('http://api.football-data.org/v2/competitions/2018/matches/');

        return collect($response->json()['matches']);
    }

    private function matchExists(int $id): bool
    {
        return (bool) Game::where('football_data_match_id', $id)->count();
    }

    private function insertMatch()
    {
        return function ($match) {
            if ($this->matchExists($match['id'])) {
                return;
            }

            $homeTeam = Team::where('football_data_team_id', $match['homeTeam']['id'])->first();
            $awayTeam = Team::where('football_data_team_id', $match['awayTeam']['id'])->first();
            $stadium = Stadium::where('name', $this->stadiumMap($match['venue']))->first();
            $date = Carbon::parse($match['utcDate'])->timezone('Europe/Zurich');

            Game::create([
                'football_data_match_id' => $match['id'],
                'home_team_id' => $homeTeam->id,
                'away_team_id' => $awayTeam->id,
                'can_predict' => true,
                'stadium_id' => $stadium->id,
                'date' => $date,
                'stage' => $match['stage'],
            ]);
        };
    }

    private function stadiumMap($venue): string
    {
        $stadiums = [
            'Johan Cruijff ArenA' => 'Johan Cruyff Arena',
            'Wembley' => 'Wembley Stadium',
            'Puskas Arena' => 'Puskás Aréna',
            'Estadio de La Cartuja' => 'La Cartuja',
            'Parken' => 'Parken Stadium',
            'Arena Nationala' => 'Arena Națională',
            'Hampden Park' => 'Hampden Park',
            'Saint Petersburg Stadium' => 'Krestovsky Stadium',
            'Fussball Arena Munich' => 'Allianz Arena',
            'Baku Olimpiya Stadionu' => 'Olympic Stadium',
            'Stadio Olimpico, Rome' => 'Stadio Olimpico',
        ];

        return $stadiums[$venue];
    }
}
