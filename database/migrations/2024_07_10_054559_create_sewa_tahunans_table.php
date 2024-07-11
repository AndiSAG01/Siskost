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
        Schema::create('sewa_tahunans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kost_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('phone');
            $table->string('gender');
            $table->string('star_date');
            $table->string('end_date');
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->string('nominal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewa_tahunans');
    }
};
