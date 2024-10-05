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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->uuid('CustomerID');
            $table->uuid('GamerID');
            $table->uuid('GameID');
            $table->date('Date');
            $table->timestamps();

            $table->foreign('CustomerID')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('GamerID')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('GameID')->references('id')->on('games')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
