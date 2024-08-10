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
        Schema::create('exams', function (Blueprint $table) {
            $table->id(); 
            $table->date('exam_date'); 
            $table->time('exam_time'); 
            $table->unsignedBigInteger('batch_id'); 
            $table->unsignedBigInteger('subject_id'); 
            $table->string('group'); 
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
