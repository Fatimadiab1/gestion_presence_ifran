<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    use HasFactory;

    protected $table = 'parents'; 

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function enfants()
    {
        return $this->belongsToMany(Etudiant::class, 'parent_etudiant', 'parent_id', 'etudiant_id');
    }
}
