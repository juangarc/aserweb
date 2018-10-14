<?php

namespace App\Http\Controllers;

use App\TipoVinculacion;
use Illuminate\Http\Request;

class TipoVinculacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipoVinculaciones = TipoVinculacion::paginate(5);

    return view('tipovinculacion.index', ['tipoVinculaciones' => $tipoVinculaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipovinculacion.create');
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
        request()->validate([
            'name' => 'required',
        ]);

         TipoVinculacion::create($request->all());

         return redirect()->route('tipovinculacion.index')
                        ->with('success','Post add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoVinculacion  $tipoVinculacion
     * @return \Illuminate\Http\Response
     */
    public function show(TipoVinculacion $tipoVinculacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoVinculacion  $tipoVinculacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tipoVinculacion = TipoVinculacion::find($id);

        return view('tipovinculacion.edit', ['tipoVinculacion' => $tipoVinculacion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoVinculacion  $tipoVinculacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
        ]);

        TipoVinculacion::find($id)->update($request->all());
        return redirect()->route('tipovinculacion.index')
                        ->with('success','Tipo de vinculacion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoVinculacion  $tipoVinculacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        TipoVinculacion::destroy($id);
        return redirect()->route('tipovinculacion.index')
                        ->with('success', 'Tipo de vinculacion deleted successfully.');
    }
}
