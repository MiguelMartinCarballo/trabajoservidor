<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $fillable=["Nombre","Direccion","CIF","Razon social"];



    public function client() {
        return $this->hasMany(Client::class);
    }
}
