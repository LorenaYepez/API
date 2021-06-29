<?php

namespace App\Http\Controllers;
use App\Cuenta;
use App\Persona;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    //
    public function retirox(Request $request)
    {
        $idPersona = $request->input("idPersona");
        $monto = $request->input("monto");
        $sql = 
        "SELECT * 
        From  cuentas  
        Where cuentas.idPersona = $idPersona and cuentas.saldo >= $monto";
        $result = DB::select($sql);
        if(count($result)>0)
        {
            echo '<pre>';  
            print_r($result) ;
            echo '</pre>' ;
        }


    }
}
