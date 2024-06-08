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
        Schema::create('concerts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('artists');
            $table->date('date');
            $table->string('city');
            $table->string('venue');
            $table->string('venue_address');
            $table->integer('ticket_price_in_rupiah');
            $table->string('videoURL');
            $table->string('imageURL');
            $table->text('additional_information')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concerts');
    }
};
