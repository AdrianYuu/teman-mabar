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
        Schema::create('competition_teams', function (Blueprint $table) {
            $table->uuid('competition_id');
            $table->uuid('team_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('competition_id')->references('id')->on('competitions')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_teams');
    }
};
