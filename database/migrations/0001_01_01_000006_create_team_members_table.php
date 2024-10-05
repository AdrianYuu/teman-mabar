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
        Schema::create('team_members', function (Blueprint $table) {
            $table->uuid();
            $table->uuid('TeamID');
            $table->uuid('PlayerID');
            $table->string('Role');
            $table->boolean('IsActive')->default(true);
            $table->timestamps();

            $table->foreign('TeamID')->references('id')->on('teams')->onUpdate('cascade');
            $table->foreign('PlayerID')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
