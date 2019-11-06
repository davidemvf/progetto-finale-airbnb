<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;

class Service extends Model
{
  protected $fillable = [
    'service_category'
  ];

  public function apartments()
  {
    return $this -> belongsToMany(Apartment::class);
  }
}
