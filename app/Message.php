<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;

class Message extends Model
{
  protected $fillable = [
    'firstname',
    'lastname',
    'content',
    'email',
    'apartment_id'
  ];

  public function apartment()
  {
    return $this -> belongsTo(Apartment::class);
  }
}
