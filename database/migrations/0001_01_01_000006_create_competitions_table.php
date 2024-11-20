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
            $table->uuid('id')->primary();
            $table->uuid('organizer_user_id');
            $table->string('name');
            $table->string('description');
            $table->integer('coin_prize');
            $table->integer('coin_registration');
            $table->integer('maximum_team');
            $table->string('type');
            $table->timestamp('registration_start_time')->nullable();
            $table->timestamp('registration_end_time')->nullable();
            $table->timestamp('competition_start_time')->nullable();
            $table->timestamp('competition_end_time')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('organizer_user_id')->references('id')->on('users')->onUpdate('cascade');
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
