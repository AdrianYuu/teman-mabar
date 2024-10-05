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
        Schema::create('teams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('GameID');
            $table->uuid('LeaderID');
            $table->string('Name');
            $table->boolean('IsActive')->default(true);
            $table->timestamps();

            $table->foreign('GameID')->references('id')->on('games')->onUpdate('cascade');
            $table->foreign('LeaderID')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
