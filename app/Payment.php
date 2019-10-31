<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;

class Payment extends Model
{
  protected $fillable = [
    'payment_code'
  ];

  public function apartments()
  {
    return $this -> belongsToMany(Apartment::class);
  }
}
