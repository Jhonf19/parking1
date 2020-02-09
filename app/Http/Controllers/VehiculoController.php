<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Vehiculo;
use App\Propietario;
use App\TipoVehiculo;

class VehiculoController extends Controller
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
        $vehiculos = DB::select("SELECT vehiculos.id, vehiculos.placa, vehiculos.tipo AS tipoNombre, vehiculos.propietario AS propietarioNombre, propietarios.id, propietarios.nombre, tipo_vehiculos.id, tipo_vehiculos.tipo FROM vehiculos, propietarios, tipo_vehiculos WHERE vehiculos.tipo =  tipo_vehiculos.id AND  propietarios.id = vehiculos.propietario");
        // $vehiculos = DB::table('vehiculos', 'propietarios')->paginate(10);
        
        // dd($vehiculos);
        // echo "<pre>";
        // print_r($vehiculos);
        // echo "</pre>";
        return view('vehiculos.index')->with('vehiculos',$vehiculos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $propietario = Propietario::where('documento', $request->input('documento'))->get();
        $propietarios = Propietario::all();
        $tipo_vehiculos = TipoVehiculo::all();
        return view('vehiculos.create')->with(compact('propietarios','tipo_vehiculos'));
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
            'placa' => 'required|min:6',
            'tipo' => 'required|numeric|min:0',
            'propietario' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules);
        $vehi = Vehiculo::where('placa', $request->input('placa'))->get();
        // dd($request->all());
        // echo "<pre>";
        // print_r($prop);
        // echo "</pre>";
        if (count($vehi) >= 1) {
            return redirect()->back()->with('msg_danger', "Placa existente");
        } else {
            $vehiculo = new Vehiculo();
            $vehiculo->placa = $request->input('placa');
            $vehiculo->tipo = $request->input('tipo');
            $vehiculo->propietario = $request->input('propietario');
            $vehiculo->save();
            return redirect('vehiculos')->with('msg_success', "Vehiculo agregado");
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propietarios = Propietario::all();
        $tipo_vehiculos = TipoVehiculo::all();
        $vehiculo = Vehiculo::find($id);
        return view('vehiculos.edit')->with(compact('vehiculo', 'propietarios', 'tipo_vehiculos'));
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
                'placa' => 'required|min:6',
                'tipo' => 'required|numeric|min:0',
                'propietario' => 'required|numeric|min:0'
            ];
            $this->validate($request, $rules);
            $vehiculo = Vehiculo::find($id);
            $vehiculo->placa = $request->input('placa');
            $vehiculo->tipo = $request->input('tipo');
            $vehiculo->propietario = $request->input('propietario');
            $vehiculo->save();
            return redirect('vehiculos')->with('msg_success', "Vehiculo editado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
