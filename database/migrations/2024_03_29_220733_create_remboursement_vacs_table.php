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
            $table->unsignedMediumInteger('nombre_heure');
            $table->unsignedMediumInteger('nombre_tickets')->default(0);
            $table->enum('statut', [0, 1, 2]);

            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');

            $table->foreignId('cours_id')
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
