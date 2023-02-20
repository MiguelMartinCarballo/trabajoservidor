<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aesthetic extends Model
{
    use HasFactory;
    protected $table='aesthetic';

    protected $fillable=["numeroSalas","fisioterapia"];
    public function center() {
        return $this->belongsTo(Center::class);
    }
}
