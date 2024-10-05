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
        Schema::create('user_reviews', function (Blueprint $table) {
            $table->uuid('gamer_user_id');
            $table->uuid('customer_user_id');
            $table->string('comment');
            $table->float('rating');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('gamer_user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('customer_user_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_reviews');
    }
};
