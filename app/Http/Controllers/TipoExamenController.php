<?php

namespace App\Http\Controllers;

use App\TipoExamen;
use Illuminate\Http\Request;

class TipoExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tipoExamenes = TipoExamen::paginate(5);
         
    return view('tipoexamen.index', ['tipoExamenes' => $tipoExamenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('tipoexamen.create');
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

         TipoExamen::create($request->all());

         return redirect()->route('tipoexamen.index')
                        ->with('success','Post add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoExamen  $tipoExamen
     * @return \Illuminate\Http\Response
     */
    public function show(TipoExamen $tipoExamen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoExamen  $tipoExamen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoExamen = TipoExamen::find($id);

        return view('tipoexamen.edit', ['tipoExamen' => $tipoExamen]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoExamen  $tipoExamen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $this->validate($request, [
            'name' => 'required',
        ]);

        TipoExamen::find($id)->update($request->all());
        return redirect()->route('tipoexamen.index')
                        ->with('success','Tipo de Examen updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoExamen  $tipoExamen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          TipoExamen::destroy($id);
        return redirect()->route('tipoexamen.index')
                        ->with('success', 'Tipo de examen deleted successfully.');
    }
}
