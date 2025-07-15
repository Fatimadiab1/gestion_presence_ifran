<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
Schema::create('justifications', function (Blueprint $table) {
    $table->id();
    $table->foreignId('presence_id')->constrained('presences')->onDelete('cascade');
    $table->text('raison')->nullable(); 
    $table->date('date_justif');
    $table->foreignId('modifie_par')->nullable()->constrained('users')->onDelete('set null');
    $table->timestamps();
});

    }
    public function down(): void
    {
        Schema::dropIfExists('justifications');
    }
};
