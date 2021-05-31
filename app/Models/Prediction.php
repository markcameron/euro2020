<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Services\ScoreService;

class Prediction extends Model
{

    public const EXACT_SCORE = 'exact_score';
    public const GOAL_DIFFERENCE = 'goal_difference';
    public const WINNER = 'winner';
    public const LOSER = 'loser';

    protected $fillable = [
        'user_id',
        'match_id',
        'score_home',
        'score_away',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeUserPredictions($query)
    {
        return $query->whereUserId(\Auth::user()->id);
    }

    public function scopeForCurrentUser($query)
    {
        return $query->whereUserId(\Auth::user()->id);
    }

    public function hasNoScore()
    {
        return is_null($this->game->score_home) && is_null($this->game->score_away);
    }

    public function decreaseScore(string $team): void
    {
        if ($this->{'score_'. $team} <= 0) {
            return;
        }

        $this->{'score_'. $team}--;
        $this->save();
    }

    public function increaseScore(string $team): void
    {
        if ($this->{'score_'. $team} >= 15) {
            return;
        }

        $this->{'score_'. $team}++;
        $this->save();
    }

    public function getPredictionStatus(): string
    {
        $scoreService = new ScoreService();
        return $scoreService->getPredictionStatus($this);
    }
}
