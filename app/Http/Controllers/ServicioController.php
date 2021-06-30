<?php

namespace App\Http\Controllers;
use App\Cuenta;
use App\Persona;
// use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    //
    public function retirox(Request $request)
    {
        $idPersona = $request->input("idPersona");
        $idCuenta = $request->input("idCuenta");
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
           $sql1 = "Update cuentas Set saldo =  $montonuevo where id = $id";
           $result1 = DB::select($sql1); 
           //aqui  estoy actualizando la cuenta del usuario 
           $sql2 = "INSERT INTO retiros (idCuenta, monto, saldo, fecha_retiro)
                                VALUES ($idCuenta, $monto, $montonuevo, date('now'))";
            $result3 = DB::select($sql2);              
            return "Su saldo actual es: $montonuevo";               
        }
    }
}
