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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naiss');
            $table->string('telephone')->unique();
            $table->boolean('status')->default(1);
            $table->string('email')->unique();
            $table->foreignId('role_id')
            ->nullable()
            ->constrained()
            ->nullOnDelete();

            $table->string('password');

            $table->foreignId('ufr_id')
            ->constrained()
            ->onDelete('cascade');

            $table->foreignId('departement_id')
            ->nullable()
            ->constrained()
            ->onDelete('cascade');

            $table->binary('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->timestamps();
            
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
