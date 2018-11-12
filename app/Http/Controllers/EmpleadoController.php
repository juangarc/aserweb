<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Cargo;
use App\Sede;
use App\TipoVinculacion;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $empleados = Empleado::paginate(5);
        $cargos = Cargo::all();
        $sedes = Sede::all();
        $tipovinculaciones = TipoVinculacion::all();

        return view('empleados.index', ['empleados' => $empleados], compact('cargos'), ['tipovinculaciones' => $tipovinculaciones, 'sedes' => $sedes] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::all();
        $tipovinculaciones = TipoVinculacion::all();
        $sedes = Sede::all();
        return view('empleados.create', compact('cargos'), ['tipovinculaciones' => $tipovinculaciones, 'sedes' => $sedes] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'id' => 'required',
            'name' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correoelectronico' => 'required',
            'id_tipovinculacion' => 'required',
            'fechadenacimiento' => 'required',
            'salario' => 'required',
            'id_cargo' => 'required',
            'id_sede' => 'required',
            'fechadeingreso' => 'required',
            'genero' => 'required',
            'estado' => 'required',

        ]);

         Empleado::create($request->all());

         return redirect()->route('empleados.index')
                        ->with('success','Post add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        $empleado = Empleado::find($id);
        return view('empleados.show', ['empleado' => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $empleado = Empleado::find($id);
        $cargos = Cargo::all();
        $tipovinculaciones = TipoVinculacion::all();
        $sedes = Sede::all();


        return view('empleados.edit', ['empleado' => $empleado], compact('cargos'), ['tipovinculaciones' => $tipovinculaciones, 'sedes' => $sedes] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correoelectornico' => 'required',
            'tipoid' => 'required',
            'fechanacimiento' => 'required',
            'salario' => 'required',
            'id_cargo' => 'required',
            'id_sede' => 'required',
            'fechadeingreso' => 'required',
            'genero' => 'required',
            'estado' => 'required',
        ]);

        Empleado::find($id)->update($request->all());
        return redirect()->route('empleados.index')
                        ->with('success','Empleado updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleado::destroy($id);
        return redirect()->route('empleados.index')
                        ->with('success', 'Empleado deleted successfully.');
    }
}
