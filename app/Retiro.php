<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retiro extends Model
{
    //
    protected $table = 'retiros';

    protected $primaryKey = 'id';

    protected $fillable = [
        'monto',
        'saldo',
        'fecha_retiro',
        'idCuenta'
    ];

    public function cuentas()
    {
        // return $this->BelongsTo('App\Persona', 'idPersona');
        return $this->hasOne('App\Cuenta', 
        'idCuenta'
    );
        
    }
}
