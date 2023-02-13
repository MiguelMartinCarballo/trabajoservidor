<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable=["Nombre","Descripcion","Precio"];

    use HasFactory;

    public function client() {
        return $this->hasMany(Client::class);
    }

}
