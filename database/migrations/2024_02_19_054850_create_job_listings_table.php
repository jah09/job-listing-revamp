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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_category_id');
            $table->integer('min_monthly_salary');
            $table->integer('max_monthly_salary');
            $table->longText('description');
            $table->enum('employment_type', ['full-time', 'part-time']);
            $table->timestamps();

            //for referencing
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('Cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('Cascade');
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('Cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
