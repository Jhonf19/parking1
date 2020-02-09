<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Ticket;
use App\Vehiculo;
use App\Historial;

class TicketController extends Controller
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
        // $tickets = Ticket::where('activo', true)->paginate(10);
        $tickets = DB::select("SELECT tickets.id, tickets.fecha,tickets.in, tickets.vehiculo, vehiculos.id AS idVehiculo, vehiculos.placa FROM tickets, vehiculos WHERE tickets.vehiculo = vehiculos.id AND tickets.activo = true ");
        return view('tickets.index')->with('tickets', $tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculos = Vehiculo::all();
        return view('tickets.create')->with(compact('vehiculos'));
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
            'fecha' => 'required|min:6',
            'in' => 'required',
            'vehiculo' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules);
        $tick = Ticket::where([
            ['vehiculo', $request->input('vehiculo')],
            ['activo', true]
        ])->get();
        // dd($request->all());
        // echo "<pre>";
        // print_r($prop);
        // echo "</pre>";
        if (count($tick) >= 1) {
            return redirect()->back()->with('msg_danger', "Vehiculo en parqueadero");
        } else {
            $ticket = new Ticket();
            $ticket->fecha = $request->input('fecha');
            $ticket->in = $request->input('in');
            $ticket->out = 'na';
            $ticket->vehiculo = $request->input('vehiculo');
            $ticket->save();
            return redirect('tickets')->with('msg_success', "Vehiculo ingresado");
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
        //
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
        $out = date('h:i a');
        $ticket = Ticket::find($id);
        $ticket->activo = false;
        $ticket->out = $out;
        $ticket->save();

        $in = $ticket->in;
        $hora1 = date_create($in);
        $hora2 = date_create($out);
        $interval = date_diff($hora2, $hora1);
        (int)$horas= $interval->format('%h');
        (int)$minutos= $interval->format('%i');
        // $difer= $interval->format('%h horas y %i minutos');
        // $horas = ceil($difer/60);
        $minutesToHours = ($minutos/60) + $horas;
        $horas = ceil($minutesToHours);
        $valor = $horas * $request->input('v_hora');
        $historial = new Historial();
        $historial->fecha = $ticket->fecha;
        $historial->ticket = $ticket->id;
        $historial->horas = $horas;
        $historial->save();

        return redirect('tickets')->with('msg_success', "Vehiculo egresado.<br>Horas: $horas <br>Cobrar: $valor");
        
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
