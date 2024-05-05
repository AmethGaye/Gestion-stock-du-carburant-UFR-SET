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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->float('volume');
            $table->decimal('prix_unitaire');
            $table->unsignedDouble('prix_total');
            $table->unsignedInteger('nombre_ticket');
            $table->unsignedInteger('entrees');
            $table->unsignedInteger('tickets_apres_entrees');
            $table->unsignedInteger('sorties');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
