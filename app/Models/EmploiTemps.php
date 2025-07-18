<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiTemps extends Model
{
    use HasFactory;

    protected $fillable = [
        'classe_annee_id',
        'matiere_id',
        'professeur_id',
        'type_cours_id',
        'jour_semaine',
        'heure_debut',
        'heure_fin',
    ];

    public function classeAnnee()
    {
        return $this->belongsTo(ClasseAnnee::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function typeCours()
    {
        return $this->belongsTo(TypeCours::class);
    }
}
