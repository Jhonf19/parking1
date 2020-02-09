<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TipoVehiculo;
class Vehiculo extends Model
{
    // public function propietario()
    // {
    //     return $this->belongsTo(Propietario::class);
    // }
    public function tipo_vehiculo()
    {
        return $this->belongsTo(TipoVehiculo::class);
    }
}
