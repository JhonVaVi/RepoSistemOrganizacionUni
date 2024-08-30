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
        Schema::create('reminder_courses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('reminder_id');
            $table->foreign('reminder_id')->references('id')->on('reminders')->onDelete('cascade');
            //table User_Course
            $table->unsignedBigInteger('user_course_id');
            $table->foreign('user_course_id')->references('id')->on('user_courses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reminder_courses');
    }
};
