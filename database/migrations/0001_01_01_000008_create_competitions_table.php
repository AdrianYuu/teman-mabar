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
        Schema::create('competitions', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->uuid('OrganizerID');
            $table->string('Name');
            $table->string('Description');
            $table->integer('Coin');
            $table->date('StartRegistrationDate');
            $table->date('EndRegistrationDate');
            $table->date('StartCompetitionDate');
            $table->date('EndCompetitionDate');
            $table->boolean('IsActive')->default(true);
            $table->timestamps();

            $table->foreign('OrganizerID')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
