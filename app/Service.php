<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
