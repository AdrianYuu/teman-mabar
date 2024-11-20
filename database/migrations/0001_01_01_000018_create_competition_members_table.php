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
        Schema::create('competition_members', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('competition_id');
            $table->uuid('player_id');
            $table->string('team_name');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('competition_id')->references('id')->on('competitions')->onUpdate('cascade');
            $table->foreign('player_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_members');
    }
};
