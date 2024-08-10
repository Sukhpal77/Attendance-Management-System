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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->boolean('present');     // Column to indicate attendance (true/false)
            $table->string('sid');          // Student ID (foreign key or reference)
            $table->string('tid');          // Teacher ID (foreign key or reference)
            $table->integer('subject_id');   // Subject ID (foreign key or reference)
            $table->integer('course_id');    // Course ID (foreign key or reference)
            $table->integer('batch_id');     // Batch ID (foreign key or reference)
            $table->string('group'); 
            $table->timestamps();
            $table->foreign('sid')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('tid')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
