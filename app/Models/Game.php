<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    protected $fillable = [
    'score_home',
    'score_away',
    ];

    protected $dates = ['date'];

    public function teamHome()
    {
        return $this->belongsTo('App\Models\Team', 'home_team_id');
    }

    public function teamAway()
    {
        return $this->belongsTo('App\Models\Team', 'away_team_id');
    }

    public function stadium()
    {
        return $this->belongsTo('App\Models\Stadium', 'stadium_id');
    }

    public function predictions()
    {
        return $this->hasMany('App\Models\Prediction');
    }

    public function userPrediction()
    {
        return $this->hasMany('App\Models\Prediction')->whereUserId(\Auth::user()->id);
    }

    public function goalsHome()
    {
        return $this->hasMany('App\Models\Goal')->whereTeam('home');
    }

    public function goalsAway()
    {
        return $this->hasMany('App\Models\Goal')->whereTeam('away');
    }
}
