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
        Schema::create('Movie', function (Blueprint $table) {
            $table->id('MovieID');
            $table->timestamps();
            $table->string('MovieTitle');
            $table->integer('MovieLength')->nullable();
            $table->integer('MovieYear')->nullable();
            $table->unsignedBigInteger('ActorPrincipalID')->nullable();
            $table->string('MovieImage')->nullable()->default('/storage/portada/default.jpg');
            $table->foreign('ActorPrincipalID')->references('ActorID')->on('Actor')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Movie');
    }
};
