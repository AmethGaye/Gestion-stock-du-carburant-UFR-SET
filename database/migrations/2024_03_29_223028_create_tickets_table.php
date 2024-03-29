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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('numero_serie');
            $table->string('nom');
            $table->decimal('volume');
            $table->unsignedTinyInteger('prix_unitaire');
            $table->unsignedTinyInteger('prix_total');
            $table->string('type');
            $table->date('expiration');

            $table->foreignId('stock_id')
            ->nullable()
            ->constrained()
            ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
