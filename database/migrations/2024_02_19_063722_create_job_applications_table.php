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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_listing_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('resume_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('tel');
            $table->enum('education',['none', 'elem', 'jhs', 'shs', 'bachelor', 'masters', 'doctorate']);
            $table->timestamps();

            //references
            $table->foreign('job_listing_id')->references('id')->on('job_listings')->onDelete('Cascade'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('Cascade'); 
            $table->foreign('resume_id')->references('id')->on('user_resumes')->onDelete('Cascade'); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
