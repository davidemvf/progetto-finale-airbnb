<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;

class Service extends Model
{
  protected $fillable = [
    'wifi',
    'pool',
    'parking',
    'reception',
    'sauna',
    'seaview'
  ];

  public function apartments()
  {
    return $this -> belongsToMany(Apartment::class);
  }
}
