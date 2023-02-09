<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    public function hairSalon() {
        return $this->hasMany(hairSalon::class);
    }
    public function aesthetic() {
        return $this->hasMany(aesthetic::class);
    }
}
