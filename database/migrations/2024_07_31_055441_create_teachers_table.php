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
        Schema::create('teachers', function (Blueprint $table) {
            $table->string('id')->primary(); // String ID as primary key
            $table->string('first_name');    // Column for the first name
            $table->string('last_name');     // Column for the last name
            $table->string('email')->unique(); // Column for the email with unique constraint
            $table->string('number');        // Column for the contact number
            $table->string('street_address'); // Column for the street address
            $table->string('city');          // Column for the city
            $table->string('state');         // Column for the state
            $table->string('pincode');       // Column for the pincode   // Column for the department or subject specialization
            $table->integer('department_id');
            $table->string('qualification')->nullable();
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
