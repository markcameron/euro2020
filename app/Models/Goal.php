<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model {

  protected $fillable = [
    'match_id',
    'team',
    'minute',
    'scored_by',
    'link',
  ];

}
