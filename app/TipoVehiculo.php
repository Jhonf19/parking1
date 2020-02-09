<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vehiculo;
class TipoVehiculo extends Model
{
    //$tipo->vehiculos
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
}
