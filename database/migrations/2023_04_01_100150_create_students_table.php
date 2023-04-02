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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('idnumber')->unique();
            $table->integer('roll');
            $table->string('name');
            $table->string('parent');
            $table->string('contact');
            $table->string('address');
            $table->string('gender');
            $table->binary('report');
            $table->timestamps();
            $table->foreignId('grade_id')->references('id')->on('grades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
