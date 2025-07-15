<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeCours extends Model
{
    protected $fillable = ['nom'];
    protected $table = 'types_cours';
}
