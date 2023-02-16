<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable=["nombre","apellidos","direccion","email"];

    public function center() {
        return $this->hasMany(Center::class);
    }
    public function treatment() {
        return $this->hasMany(Treatment::class);
    }

}
