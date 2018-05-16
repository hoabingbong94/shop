<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custormer extends Model
{
   protected $table = 'custormers';

   protected $fillable = [
        'name', 'address', 'phone', 'quantily', 'status'
    ];
}
