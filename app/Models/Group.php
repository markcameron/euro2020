<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

  protected $fillable = [
    'name',
  ];

  protected function teams() {
    return $this->hasMany('App\Models\Team');
  }

}
