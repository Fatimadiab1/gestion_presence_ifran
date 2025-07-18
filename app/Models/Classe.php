<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    // 🔗 Relations

    public function classesAnnees()
    {
        return $this->hasMany(ClasseAnnee::class);
    }
}
