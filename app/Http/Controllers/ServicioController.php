<?php

namespace App\Http\Controllers;
use App\Cuenta;
use App\Persona;
use DB;
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
           // update
           $id= $result[0]->id;
           $montonuevo =$result[0]->saldo - $monto;
            //aqui  estoy actualizando la cuenta del usuario 
           $laUpdateCuenta = DB::table('cuentas')
           ->where('id',$id)
           ->update(['Monto'=>0]);

           //  aqui estoy insertando el retiro 
           $datos=DB::table('retiro')
                        ->insert(['monto'=> $monto,
                                'saldo' =>$montonuevo   
                                ]);
            echo  $datos;
        }


    }
}
