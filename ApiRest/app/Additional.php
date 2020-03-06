<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'art', 
        'cinema', 
        'music',
        'iduser',
    ];
}
