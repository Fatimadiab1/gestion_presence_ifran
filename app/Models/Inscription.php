<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = ['etudiant_id', 'classe_annee_id'];

 
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }


    public function classeAnnee()
    {
        return $this->belongsTo(ClasseAnnee::class);
    }
}
