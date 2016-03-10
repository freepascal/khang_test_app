<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false;
    protected $fillable = array(
        'name',
        'address',
        'age',
        'photo'
    );
}
