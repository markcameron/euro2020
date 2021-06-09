<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    protected $fillable = [
        'score_home',
        'score_away',
        'football_data_match_id',
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
        return $this->hasOne('App\Models\Prediction')->whereUserId(\Auth::user()->id);
    }

    public function matchPrediction()
    {
        return $this->hasOne('App\Models\Prediction')->whereUserId(\Auth::user()->id)->withDefault([
            'user_id' => \Auth::user()->id,
            'score_home' => 0,
            'score_away' => 0,
        ]);
    }

    public function goalsHome()
    {
        return $this->hasMany('App\Models\Goal')->whereTeam('home');
    }

    public function goalsAway()
    {
        return $this->hasMany('App\Models\Goal')->whereTeam('away');
    }

    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }

    public function getScoreHomeAttribute()
    {
        return $this->goalsHome->count();
    }

    public function getScoreAwayAttribute()
    {
        return $this->goalsAway->count();
    }

    public function getShowPredictionsAttribute()
    {
        return $this->predictions->isNotEmpty();
    }

    public function getStartedAttribute()
    {
        return $this->date->isBefore(now());
    }
}
