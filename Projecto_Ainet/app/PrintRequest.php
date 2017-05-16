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

    public function getCoresString($cor){
        switch($cor){
            case 0 :
                return "Monochromatic";
            case 1 :
                return "Colored";
            default: return null;
        }
    }

    public function getTamanhoString($tamanho){
        switch($tamanho){
            case 0 :
                return "A3";
            case 1 :
                return "A4";
            default: return null;
        }
    }

    public function getTipoString($tipo){
        switch($tipo){
            case 0 :
                return "Draft";
            case 1 :
                return "Normal";
            case 2 :
                return "Photograpic";
            default: return null;
        }
    }
}
