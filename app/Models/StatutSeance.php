<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatutSeance extends Model
{
    protected $fillable = ['nom'];
    protected $table = 'statuts_seance';
}
