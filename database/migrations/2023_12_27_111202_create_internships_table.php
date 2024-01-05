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
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to the users table
            $table->unsignedBigInteger('supervisor_id'); // Foreign key to the supervisors table
            $table->string('company'); // Name of the company where the internship is taking place
            //$table->string('supervisor_name'); // Name of the external supervisor
            $table->string('country');
            $table->string('county');
            $table->string('address');
            $table->string('website')->nullable();
            $table->string('duration'); // Duration of the internship in weeks
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('supervisor_id')->references('id')->on('supervisors')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};
