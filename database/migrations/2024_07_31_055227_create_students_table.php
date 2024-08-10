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
        Schema::create('students', function (Blueprint $table) {
            $table->string('id')->primary(); // String ID as primary key
            $table->string('first_name');    // Column for the first name
            $table->string('last_name');     // Column for the last name
            $table->string('email')->unique(); // Column for the email with unique constraint
            $table->string('number');        // Column for the contact number
            $table->string('street_address'); // Column for the street address
            $table->string('city');          // Column for the city
            $table->string('state');         // Column for the state
            $table->string('pincode');       // Column for the pincode
            $table->integer('course_id');     // Foreign key column for the course ID
            $table->integer('batch_id');      // Foreign key column for the batch ID
            $table->string('group'); 
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
