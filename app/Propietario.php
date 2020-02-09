<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vehiculo;

class Propietario extends Model
{
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
}
