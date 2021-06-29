<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $table = 'personas';

    protected $primaryKey = 'id';

    protected $fillable = [

        'name',
        'email', 
        'direccion',
        'CI',
        'telefono',
        'estado',
    ];

    public $timestamps = true;
}
