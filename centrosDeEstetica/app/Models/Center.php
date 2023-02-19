<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $fillable=["Nombre","Direccion","CIF","Razon social"];

    public function hairsalon() {
        return $this->hasMany(hairsalon::class);
    }

    public function aesthetic() {
        return $this->hasMany(Aesthetic::class);
    }
}
