<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$empleados = Empleado::get();
        // $buyer->id == $product->seller_id



        // $empleados = DB::table('empleados')->get();
        // return $empleados;
        /*
        'email', 
        'password',
        'direccion',
        'CI',
        'telefono',
        'foto'
        */

        // $empleados = Empleado::first();
        // $empleados->idPersona;
        // $empleados->name;
        // $empleados->email;
        // $empleados->direccion;
        // $empleados->telefono;
        // $empleados->foto;
        //return json_encode($empleados);

        
        // $empleados = Persona::first();
        // $empleados->idPersona;
        // return response()->json($empleados, 200);

        // Select *
        // From Empleado
        // Where id = '10'

        $sql = 
        'SELECT empleados.id,personas.name,personas.email,personas.direccion, personas.CI, personas.telefono, personas.foto, empleados.fotoCertificado, servicios.nombre, servicios.descripcion
        FROM personas ,empleados, servicios, empleado_servicio
        WHERE  personas.id=empleados.idPersona and empleados.id=empleado_servicio.idEmpleado and servicios.id=empleado_servicio.idServicio';
        $empleado = DB::select($sql);
        return $empleado;

        // if(Empleado::where('id', $id)->exists()) {
        //     //$empleados = Persona::first();
        //     $empleados = Empleado::find($id);  
        //     // $empleados->idPersona;
        //     return response()->json($empleados, 200);
        // }else{
        //         return response()->json(["message" => "No dio"], 404);
        // }

        // $empleado = Empleado::get();
    	// $empleado = Persona::find($id)->personas;
    	// // return view('nota/index', ['nota' => $nota]);
        // return json_encode($empleado);


        // $empleados = Empleado::where('id', $id) ->exists();
        // if($empleados == $id){
        //     // return response()->json($empleados, 200);
        //     return response()->json(["message" => "mostrar el empleado"], 200);
        // }else{
        //     return response()->json(["message" => "No dio"], 404);
        // }
        

        //return response()->json($empleados, 200);
        
        // $empleados = Empleado::get();
        // $empleados = Persona::find($id)->empleados;
        // // return response()->json($empleados, 200);
        // return $this->showAll($empleados);

        //$empleado = Empleado::get();
        // $empleado = Persona::find($id)->empleados;
        // return $this->showAll($empleado);
        // return response()->json($empleado, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Instanciamos la clase empleados
        $empleado = new Empleado;
        //Declaramos el nombre con el nombre enviado en el request
        $empleado->nombre = $request->nombre;
        $empleado->fotoCertificado = $request->fotoCertificado;
        //Guardamos el cambio en nuestro modelo
        $empleado->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $empleado = Empleado::find($id);
        // if (!is_null($empleado))
        //     return response($empleado->toArray());
        // else
        //     return response('no encontrado', 404); 
        
        $empleado = Empleado::find($id);
        return $empleado->toArray();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
