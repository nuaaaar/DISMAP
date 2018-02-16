<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tower extends Model
{
    protected $table = 'tower';

    protected $guarded = [
        'id',
    ];
}
