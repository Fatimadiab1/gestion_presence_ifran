<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuiviEtudiant extends Model
{
    protected $fillable = ['inscription_id', 'statut_etudiant_id'];

    public function inscription()
    {
        return $this->belongsTo(Inscription::class);
    }

    public function statut()
    {
        return $this->belongsTo(StatutEtudiant::class, 'statut_etudiant_id');
    }
}
