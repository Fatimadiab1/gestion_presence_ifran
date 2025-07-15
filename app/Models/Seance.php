<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    protected $fillable = [
        'matiere_id',
        'professeur_id',
        'classe_annee_id',
        'date',
        'heure_debut',
        'heure_fin',
        'type_cours_id',
        'trimestre_id',
        'statut_seance_id',
        'seance_reportee_de_id',
    ];

 
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

  
    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }


    public function classeAnnee()
    {
        return $this->belongsTo(ClasseAnnee::class);
    }

    public function typeCours()
    {
        return $this->belongsTo(TypeCours::class);
    }

 
    public function trimestre()
    {
        return $this->belongsTo(Trimestre::class);
    }

    public function statutSeance()
    {
        return $this->belongsTo(StatutSeance::class);
    }

    public function seanceReporteeDe()
    {
        return $this->belongsTo(Seance::class, 'seance_reportee_de_id');
    }

  
    public function presences()
    {
        return $this->hasMany(Presence::class);
    }
}
