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
        Schema::create('user_comments', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->uuid('GamerID');
            $table->uuid('CustomerID');
            $table->string('Comment');
            $table->boolean('IsActive')->default(true);
            $table->timestamps();

            $table->foreign('GamerID')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('CustomerID')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_comments');
    }
};
