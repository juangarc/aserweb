<?php

namespace App\Http\Controllers;

use App\Ausentismo;
use App\Empleado;
use Illuminate\Http\Request;

class AusentismoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ausentismos = Ausentismo::paginate(5);
        $empleados = Empleado::all();

        return view('ausentimos.index', ['ausentimos' => $ausentismos], compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::all();
        return view('ausentimos.index', ['ausentimos' => $ausentismos], compact('empleados'));
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
            'fecha_registro' => 'required',
            'id_empleado' => 'required',
            'id_tipoausentismo' => 'required',
            'area' => 'required',
            'fecha_inicio' => 'required',
            'tiempo_ausencia' => 'required',
            'grado' => 'required',
            'observacion' => 'required',
        ]);

         Ausentismo::create($request->all());

         return redirect()->route('ausentismos.index')
                        ->with('success','Post add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ausentismo  $ausentismo
     * @return \Illuminate\Http\Response
     */
    public function show(Ausentismo $ausentismo)
    {
        $ausentismo = Ausentismo::find($id);
        return view('ausentismos.show', ['ausentismo' => $ausentismo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ausentismo  $ausentismo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ausentismo = Ausentismo::find($id);
        $empleados = Empleado::all();

        return view('ausentismos.edit', ['ausentismo' => $ausentismo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ausentismo  $ausentismo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ausentismo $ausentismo)
    {
        $this->validate($request, [
            'fecha_registro' => 'required',
            'id_empleado' => 'required',
            'id_tipoausentismo' => 'required',
            'area' => 'required',
            'fecha_inicio' => 'required',
            'tiempo_ausencia' => 'required',
            'grado' => 'required',
            'observacion' => 'required',
        ]);

        Ausentismo::find($id)->update($request->all());
        return redirect()->route('ausentismos.index')
                        ->with('success','Ausentismo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ausentismo  $ausentismo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ausentismo $ausentismo)
    {
        Ausentismo::destroy($id);
        return redirect()->route('ausentismos.index')
                        ->with('success', 'Ausentismo deleted successfully.');
    }
}
