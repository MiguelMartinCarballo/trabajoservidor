<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HairSalon extends Model
{
    use HasFactory;
    protected $fillable=["capacidadMaxima","unisex"];
protected $table='hairsalon';


    public function center() {
        return $this->belongsTo(Center::class);
    }
}
