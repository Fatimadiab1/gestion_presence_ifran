<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
Schema::create('presences', function (Blueprint $table) {
    $table->id();
    $table->foreignId('etudiant_id')->constrained('etudiants')->onDelete('cascade');
    $table->foreignId('seance_id')->constrained('seances')->onDelete('cascade');
    $table->foreignId('statut_presence_id')->constrained('statuts_presence')->onDelete('cascade');
    $table->timestamp('modifie_a')->nullable(); 
    $table->foreignId('modifie_par')->nullable()->constrained('users')->onDelete('set null'); 
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
