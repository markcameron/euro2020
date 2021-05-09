<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {

  protected $fillable = [
    'name',
  ];

  protected function group() {
    return $this->belongsTo('App\Models\Group');
  }

}
