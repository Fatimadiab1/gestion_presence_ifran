<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('suivi_etudiants', function (Blueprint $table) {
    $table->id();
    $table->foreignId('inscription_id')->constrained('inscriptions')->onDelete('cascade');
    $table->foreignId('statut_etudiant_id')->constrained('statuts_etudiants')->onDelete('cascade');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suivi_etudiants');
    }
};
