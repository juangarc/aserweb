<?php

namespace App\Http\Controllers;

use App\Ausentismo;
use App\Empleado;
use App\Tipoausentismo;
use App\Cargo;
use Illuminate\Http\Request;
use DB;

class AusentismoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all();
        $tipoausentismos = Tipoausentismo::all();
        $cargos = Cargo::all();
        $ausentismos = DB::table('ausentismos')
        ->join('tipoausentismos', 'tipoausentismos.id','=', 'ausentismos.id_tipoausentismo')
        ->join('empleados', 'empleados.id', '=', 'ausentismos.id_empleado')
        ->join('cargos', 'cargos.id', '=', 'ausentismos.id_cargo')
        ->select('ausentismos.*', 'tipoausentismos.name as nameTipoausentismo', 'empleados.name as nameEmpleado','empleados.apellido as apellidoEmpleado', 'cargos.name as nameCargo')
        ->paginate(5);

        return view('ausentismos.index')->with(['ausentismos' => $ausentismos, 'empleados' => $empleados, 'tipoausentismos' => $tipoausentismos, 'cargos' => $cargos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::all();
        $tipoausentismos = Tipoausentismo::all();
        $cargos = Cargo::all();
        $salario = $this->absenceCost(1123);
        var_dump($salario);
        return view('ausentismos.create')->with(['empleados' => $empleados, 'tipoausentismos' => $tipoausentismos,
                                                 'cargos' => $cargos, 'salario' => $salario]);
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
            'id_cargo' => 'required',
            'fecha_inicio' => 'required',
            'tiempo_ausencia' => 'required',
            'costo_ausencia' => 'required',
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
        $ausentismos = Ausentismo::find($id);
        
        return view('ausentismos.show', ['ausentismos' => $ausentismos], compact('empleados'), ['tipoausentismos' => $tipoausentismos]);
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
        $tipoausentismos = Tipoausentismo::all();
        $cargos = Cargo::all();

        return view('ausentismos.edit')->with(['ausentismos' => $ausentismos, 'empleados' => $empleados, 'tipoausentismos' => $tipoausentismos, 'cargos' => $cargos]);
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
            'id_cargo' => 'required',
            'fecha_inicio' => 'required',
            'tiempo_ausencia' => 'required',
            'costo_ausencia' => 'required',
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
    public function destroy($id)
    {
        Ausentismo::destroy($id);
        return redirect()->route('ausentismos.index')
                        ->with('success', 'Ausentismo deleted successfully.');
    }

    public function absenceCost ($id_empleado) 
    {
        $salario = DB::table('empleados')
        ->select('salario')
        ->where('id','=', $id_empleado)
        ->get();

        return $salario;
    }

    public function showEmpleado(Empleado $empleado)
    {
        $empleado = Empleado::find($id);
        return view('empleados.show')->with('empleado', $empleado);
    }
}

