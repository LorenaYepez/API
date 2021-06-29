<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $persona = array(Persona::all());
        // // return response()->json($persona, 200);
        // die(json_encode($persona));
        return Persona::all();
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $persona = new Persona;
        $persona-> id = $request->id;
        $persona-> name = $request->name;
        $persona-> email = $request->email;
        $persona-> direccion = $request->direccion;
        $persona-> telefono = $request->telefono;
        $persona-> CI = $request->CI;
        $persona->save();
        return response()->json($persona, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    // public function show(Persona $persona)
    public function show($id)
    { 
        $persona = Persona::where('id', $id)->get();
        return response()->json($persona, 200);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Persona  $persona
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Persona $persona)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if(Persona::where('id', $id)->exists()) {
            $persona = Persona::find($id);
            $persona->update($request->all());
            return response()->json($persona, 202);
        } else {
            return response()->json(["message" => "Persona not found"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Persona::where('id', $id)->exists()) {
            $persona = Persona::find($id);
            $persona->delete();
            return response()->json($persona, 202);
        } else {
            return response()->json(["message" => "Persona not found"], 404);
        }
    }
}
