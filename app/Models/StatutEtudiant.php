<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatutEtudiant extends Model
{
    protected $fillable = ['nom'];

    public function suivis()
    {
        return $this->hasMany(SuiviEtudiant::class);
    }
}
