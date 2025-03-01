<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_code');
            $table->string('name');
            $table->string('publication');
            $table->string('academic_year');
            $table->integer('full_marks')->default(0);
            $table->integer('pass_marks')->default(0);
            $table->timestamps();
            $table->foreignId('grade_id')->references('id')->on('grades');
            $table->foreignId('teacher_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
};
