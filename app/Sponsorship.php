<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;

class Sponsorship extends Model
{
  protected $fillable = [
    'price',
    'time_period',
    'start'
  ];

  public function apartments()
  {
    return $this -> belongsToMany(Apartment::class);
  }
}
