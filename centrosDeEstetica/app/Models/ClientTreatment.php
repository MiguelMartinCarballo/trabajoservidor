<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTreatment extends Model
{
    use HasFactory;

     protected $table= 'client_treatment';

    protected $fillable=["client_id","treatment_id"];
}
