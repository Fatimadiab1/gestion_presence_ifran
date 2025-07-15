<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasseAnnee extends Model
{
    use HasFactory;

    protected $fillable = ['classe_id', 'annee_academique_id', 'coordinateur_id'];


    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function anneeAcademique()
    {
        return $this->belongsTo(AnneeAcademique::class);
    }

  
    public function coordinateur()
    {
        return $this->belongsTo(Coordinateur::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }


    public function emploiTemps()
    {
        return $this->hasMany(EmploiTemps::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
