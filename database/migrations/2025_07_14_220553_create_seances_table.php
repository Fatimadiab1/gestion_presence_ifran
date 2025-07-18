<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matiere_id')->constrained('matieres')->onDelete('cascade');
            $table->foreignId('professeur_id')->constrained('professeurs')->onDelete('cascade');
            $table->foreignId('classe_annee_id')->constrained('classe_annees')->onDelete('cascade');
            $table->date('date');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->foreignId('type_cours_id')->constrained('types_cours')->onDelete('cascade');
            $table->foreignId('trimestre_id')->constrained('trimestres')->onDelete('cascade');
            $table->foreignId('statut_seance_id')->constrained('statuts_seance')->onDelete('cascade');
            $table->foreignId('seance_reportee_de_id')->nullable()->constrained('seances')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seances');
    }
};
