<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Cuenta extends Model
{
    protected $table = 'cuentas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'numero_cuenta',
        'tipo_cuenta',
        'saldo',
        'idPersona'
    ];

    public function personas()
    {
        // return $this->BelongsTo('App\Persona', 'idPersona');
        return $this->hasOne('App\Persona', 
        'idPersona'
    );
        
    }

}
