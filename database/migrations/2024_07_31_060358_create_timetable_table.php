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
        Schema::create('timetable', function (Blueprint $table) {
            $table->id();
            $table->string('day');          // Column for the day of the week (e.g., 'Monday')
            $table->integer('subject_id');   // Subject ID (foreign key or reference)
            $table->integer('course_id');    // Course ID (foreign key or reference)
            $table->integer('batch_id');     // Batch ID (foreign key or reference)
            $table->string('group');        // Group (e.g., 'Group A')
            $table->string('teacher_id');   // Teacher ID (foreign key or reference)
            $table->time('start_time');     // Start time for the class
            $table->time('end_time'); 
            $table->timestamps();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetable');
    }
};
