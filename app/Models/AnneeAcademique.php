<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeAcademique extends Model
{
    use HasFactory;

    protected $fillable = ['annee', 'date_debut', 'date_fin'];

      public function trimestres()
    {
        return $this->hasMany(Trimestre::class);
    }

   public function classesAnnees()
    {
        return $this->hasMany(ClasseAnnee::class);
    }
}
