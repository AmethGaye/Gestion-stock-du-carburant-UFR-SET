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
        Schema::create('remboursement_vacs', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('nombre_heure');
            $table->unsignedTinyInteger('nombre_tickets');
            $table->boolean('statut');

            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');

            $table->foreignId('matiere_id')
            ->constrained()
            ->onDelete('cascade');

            $table->foreignId('vacataire_id')
            ->constrained()
            ->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remboursement_vacs');
    }
};
