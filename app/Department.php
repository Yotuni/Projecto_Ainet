<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "departaments";

    protected $fillable = [
        'name',
    ];
}
