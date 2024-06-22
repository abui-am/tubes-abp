<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('concert_id');
            $table->string('seat_no', 10);
            $table->string('seat_type', 10);
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
            $table->boolean('is_paid')->default(false);

            $table->foreign('concert_id')->references('id')->on('concerts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats');
    }
};
