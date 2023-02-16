<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable=["nombre","apellidos","direccion","email","center_id"];

    public function center() {
        return $this->belongsTo(Center::class);
    }
    public function treatments() {
        
        return $this->belongsToMany(Treatment::class);
    }
  

}
