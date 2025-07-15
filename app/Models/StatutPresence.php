<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatutPresence extends Model
{
    protected $fillable = ['nom'];
    protected $table = 'statuts_presence';
}
