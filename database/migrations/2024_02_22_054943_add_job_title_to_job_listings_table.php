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
        Schema::table('job_listings', function (Blueprint $table) {
            /* 
            //your guide on creating new migration-> this command kay mag add ra og table column name only, para dili na dayun mag migrate fresh
    php artisan make:migration add_job_title_to_job_listings_table
            
            */
            $table->string('job_title')->after('max_monthly_salary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            //
        });
    }
};
