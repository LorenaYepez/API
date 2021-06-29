<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //
    protected $table = 'empleados';

    protected $primaryKey = 'id';

    protected $fillable = [
        'fotoCertificado',
        'idPersona'
    ];

    public function personas()
    {
        // return $this->BelongsTo('App\Persona', 'idPersona');
        return $this->hasOne('App\Persona', 
        'idPersona'
    );
        
    }

    /*
     return $this->hasOne(Phone::class);
    */ 

    public $timestamps = false;
}
