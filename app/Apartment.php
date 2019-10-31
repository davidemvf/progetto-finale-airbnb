<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Service;
use App\Sponsorship;

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

  public function user()
  {
    return $this -> belongsTo(User::class);
  }

  public function services()
  {
    return $this -> belongsToMany(Service::class);
  }

  public function sponsorships()
  {
    return $this -> belongsToMany(Sponsorship::class);
  }


}
