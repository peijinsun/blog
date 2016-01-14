<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    //
    protected $fillable = ['worths', 'clicks'];
    public $timestamps = false;
}
