<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propietario;

class PropietarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propietarios = Propietario::paginate(10);
        return view('propietarios.index')->with(compact('propietarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('propietarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'documento' => 'required|numeric|min:8',
            'nombre' => 'required|min:5',
            'correo' => 'required|email:rfc,dns',
            'telefono' => 'required|numeric|min:7',
        ];
        $this->validate($request, $rules);
        $prop = Propietario::where('documento', $request->input('documento'))->get();
        // dd($request->all());
        // echo "<pre>";
        // print_r($prop);
        // echo "</pre>";
        if (count($prop) >= 1) {
            return redirect()->back()->with('msg_danger', "documento existente");
        } else {
            $propietario = new Propietario();
            $propietario->documento = $request->input('documento');
            $propietario->nombre = $request->input('nombre');
            $propietario->correo = $request->input('correo');
            $propietario->telefono = $request->input('telefono');
            $propietario->save();
            return redirect('propietarios')->with('msg_success', "Propietario agregado");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propietario = Propietario::find($id);
        return view('propietarios.edit')->with(compact('propietario'));
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
        $rules = [
            'documento' => 'required|numeric|min:8',
            'nombre' => 'required|min:5',
            'correo' => 'required|email:rfc,dns',
            'telefono' => 'required|numeric|min:7',
        ];
        $this->validate($request, $rules);
        
       
            $propietario =  Propietario::find($id);
            $propietario->documento = $request->input('documento');
            $propietario->nombre = $request->input('nombre');
            $propietario->correo = $request->input('correo');
            $propietario->telefono = $request->input('telefono');
            $propietario->save();
            return redirect('propietarios')->with('msg_success', "Propietario editado");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $propietario = Propietario::find($id);
        $propietario->delete();
        return redirect('propietarios')->with('msg_success', "Propietario eliminado");
    }
}
