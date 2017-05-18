<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'requests';

    protected $fillable = [
        'owner_id', 'status', 'due_date', 'description', 'quantity', 'colored',
        'stapled', 'paper_size', 'paper_type', 'file', 'printer_id', 'front_back',
    ];

}
