<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'seance_id',
        'statut_presence_id',
        'modifie_a',
        'modifie_par',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }

    public function statutPresence()
    {
        return $this->belongsTo(StatutPresence::class);
    }

    public function modificateur()
    {
        return $this->belongsTo(User::class, 'modifie_par');
    }

    public function justification()
    {
        return $this->hasOne(Justification::class);
    }
}
