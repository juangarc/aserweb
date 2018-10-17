<?php

namespace App\Http\Controllers;

use App\Tipoausentismo;
use Illuminate\Http\Request;

class TipoausentismoController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoausentismos = Tipoausentismo::paginate(5);

    return view('tipoausentismos.index', ['tipoausentismos' => $tipoausentismos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoausentismos.create');
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

        Tipoausentismo::create($request->all());

         return redirect()->route('tipoausentismos.index')
                        ->with('success','Post add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipoausentismo  $tipoausentismo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipoausentismo $tipoausentismo)
    {
        $tipoausentismo = Tipoausentismo::find($id);
        return view('tipoausentismos.show', ['tipoausentismo' => $tipoausentismo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipoausentismo  $tipoausentismo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoausentismo = Tipoausentismo::find($id);

        return view('tipoausentismos.edit', ['tipoausentismo' => $tipoausentismo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipoausentismo  $tipoausentismo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Tipoausentismo::find($id)->update($request->all());
        return redirect()->route('tipoausentismos.index')
                        ->with('success','Tipoausentismo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipoausentismo  $tipoausentismo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tipoausentismo::destroy($id);
        return redirect()->route('tipoausentismos.index')
                        ->with('success', 'Tipoausentismo deleted successfully.');
    }
}
