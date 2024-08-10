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
        Schema::table('admin', function (Blueprint $table) {
            $table->string('position')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('qualification')->nullable();

            // If you have a departments table and want to add a foreign key constraint:
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->dropColumn('position');
            $table->dropColumn('department_id');
            $table->dropColumn('qualification');

            // If you added a foreign key constraint:
            $table->dropForeign(['department_id']);
        });
    }
};
