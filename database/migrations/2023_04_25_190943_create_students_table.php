<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lockers', function (Blueprint $table) {
            $table->id();
            $table->string('locker_num')->unique();
            $table->boolean('locker_activate')->default(0)->change();
            $table->timestamps();
        });
        
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('NFCnum')->unique();
            $table->string('student_id')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('activity_mood')->default(0)->change();
            $table->unsignedBigInteger('locker_id')->nullable();
            $table->timestamps();
        
            $table->foreign('locker_id')->references('id')->on('lockers')->onDelete('set null');
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
        Schema::dropIfExists('lockers');
    }
}

