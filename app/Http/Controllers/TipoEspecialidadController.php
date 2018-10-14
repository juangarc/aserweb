<?php

namespace App\Http\Controllers;

use App\TipoEspecialidad;
use Illuminate\Http\Request;

class TipoEspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $tipoEspecialidades = TipoEspecialidad::paginate(5);
         
    return view('tipoespecialidad.index', ['tipoEspecialidades' => $tipoEspecialidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('tipoespecialidad.create');
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
            'name' => 'required',
        ]);

         TipoEspecialidad::create($request->all());

         return redirect()->route('tipoespecialidad.index')
                        ->with('success','Tipo de especialidad add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoEspecialidad  $tipoEspecialidad
     * @return \Illuminate\Http\Response
     */
    public function show(TipoEspecialidad $tipoEspecialidad)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoEspecialidad  $tipoEspecialidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $tipoEspecialidad = TipoEspecialidad::find($id);

        return view('tipoespecialidad.edit', ['tipoEspecialidad' => $tipoEspecialidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoEspecialidad  $tipoEspecialidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
             $this->validate($request, [
            'name' => 'required',
        ]);

        TipoEspecialidad::find($id)->update($request->all());
        return redirect()->route('tipoespecialidad.index')
                        ->with('success','Tipo de especialidad updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoEspecialidad  $tipoEspecialidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          TipoEspecialidad::destroy($id);
        return redirect()->route('tipoespecialidad.index')
                        ->with('success', 'Tipo de especialidad deleted successfully.');
    }
}
