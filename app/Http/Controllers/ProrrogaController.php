<?php

namespace App\Http\Controllers;

use app\Prorroga;
use Illuminate\Http\Request;

class ProrrogaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prorrogas = Prorroga::paginate(5);

        return view('prorrogas.index',['prorrogas' => $prorrogas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prorrogas.create');
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
            'cantidad_dia_prorroga' => 'required',
            'fechainicio' => 'required',
            'icapacidad','%incapacidad'=> 'required',
            'seguimiento_incapacidad'=> 'required',
        ]);

        Prorroga::create($request->all());

        return redirect()->route('ausentismos.index')
                        ->with('success','Post add successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prorrogas = Prorroga::find($id);
        
        return view('prorrogas.show', ['prorrogas' => $prorrogas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prorroga = Prorroga::find($id);
        return view('prorrogas.edit', ['prorrogas' => $prorrogas]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cantidad_dia_prorroga' => 'required',
            'fechainicio' => 'required',
            'icapacidad','%incapacidad'=> 'required',
            'seguimiento_incapacidad'=> 'required',
        ]);

        Prorroga::find($id)->update($request->all());
        return redirect()->route('prorrogas.index')
                        ->with('success','Prorroga updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prorroga::destroy($id);
        return redirect()->route('cargos.index')
                        ->with('sucess', 'Prorroga Eliminada');
    }
}
