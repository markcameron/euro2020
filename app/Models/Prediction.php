<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model {

  protected $fillable = [
    'user_id',
    'match_id',
    'score_home',
    'score_away',
  ];

  public function match() {
    return $this->belongsTo('App\Models\Match');
  }

  public function user() {
    return $this->belongsTo('App\Models\User');
  }

  public function scopeUserPredictions($query) {
    return $query->whereUserId(\Auth::user()->id);
  }

  public function scopeForCurrentUser($query) {
    return $query->whereUserId(\Auth::user()->id);
  }

}
