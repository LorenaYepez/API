<?php

namespace App\Http\Controllers;
use App\Cuenta;
use App\Persona;
use App\Retiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class RetiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sql=
        // "SELECT retiros.id, personas.name, retiros.monto, retiros.saldo, retiros.fecha_retiro
        // FROM retiros, cuentas ,personas
        // WHERE retiros.idCuenta = cuentas.id AND cuentas.idPersona = personas.id";
        $sql= "SELECT * FROM RETIROS";
		$retiro = DB::select($sql);
        return $retiro;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $retiro = new Retiro;
        $retiro-> id = $request->id;
        $retiro-> idCuenta = $request->idCuenta;
        $retiro-> monto = $request->monto;
        $retiro-> saldo = $request->saldo;
        $retiro-> fecha_retiro = $request->fecha_retiro;
        $retiro->save();
        return response()->json($retiro, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Retiro  $retiro
     * @return \Illuminate\Http\Response
     */
    public function show(Retiro $retiro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Retiro  $retiro
     * @return \Illuminate\Http\Response
     */
    public function edit(Retiro $retiro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Retiro  $retiro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // if(Retiro::where('id', $id)->exists()) {
        //     $retiro = Retiro::find($id);
        //     $retiro->update($request->all());
        //     return response()->json($retiro, 202);
        // } else {
        //     return response()->json(["message" => "Cuenta no encontrada"], 404);
        // }
       // }
       //dsmmmmmmmmmmmm
        $sql = 
        "UPDATE retiros
        $retirno ->$monto = $request->monto
        SET monto = monto - $monto
        WHERE retiros.id  = $id";
        $retiro = DB::select($sql);
        return $retiro;
    }

/*
public function getSaldo($idCuenta,$monto)
	{

		$sql="SELECT saldo FROM cuenta WHERE  idcuenta='$idCuenta' AND saldo>='$monto'";
		return ejecutarConsultasimplefila($sql);//retorna valores  
	}
*/
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retiro  $retiro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retiro $retiro)
    {
        //
    }
}
