<?php

namespace App\Http\Controllers;
use App\Cuenta;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CuentaController extends Controller
{
    public function index()
    {
        $sql = 
        'SELECT cuentas.id, personas.name, personas.email, personas.direccion, personas.telefono, cuentas.numero_cuenta, cuentas.tipo_sueldo, cuentas.saldo
        FROM cuentas, personas 
        WHERE  personas.id=cuentas.idPersona';
        $cuenta = DB::select($sql);
        return $cuenta;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuenta = new Cuenta;
        $cuenta-> id = $request->id;
        $cuenta-> idPersona = $request->idPersona;
        $cuenta-> numero_cuenta = $request->numero_cuenta;
        $cuenta-> tipo_sueldo = $request->tipo_sueldo;
        $cuenta-> saldo = $request->saldo;
        $cuenta->save();
        return response()->json($cuenta, 200);
    }

    public function update(Request $request, $id)
    {
        if(Cuenta::where('id', $id)->exists()) {
            $cuenta = Cuenta::find($id);
            $cuenta->update($request->all());
            return response()->json($cuenta, 202);
        } else {
            return response()->json(["message" => "Cuenta no encontrada"], 404);
        }
    }

}

