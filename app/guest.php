<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guest extends Model
{
    protected $fillable = [
        'name', 'birth_date'
    ];
}
