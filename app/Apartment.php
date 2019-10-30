<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
      'title',
      'desc',
      'rooms',
      'beds',
      'toilettes',
      'square_meters',
      'address',
      'lat',
      'long'
    ];
}
