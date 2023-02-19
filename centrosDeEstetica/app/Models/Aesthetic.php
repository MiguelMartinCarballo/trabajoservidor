<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aesthetic extends Model
{
    use HasFactory;
    protected $table='aestheic';
    public function center() {
        return $this->belongsTo(Center::class);
    }
}
