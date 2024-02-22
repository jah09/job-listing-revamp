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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('age');
            $table->enum('gender', ['male', 'female']); //['male', 'female', 'non-binary', 'other']); -> if sa UI kay kung upat ang choice, dapat upat pud sa array but if duha ra kay dapat Male and Female rapud
            $table->string('address');
            $table->integer('tel')->nullable();
            //for referencing
            $table->foreign('user_id')->references('id')->on('user_details')->onDelete('Cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
