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
        Schema::table('students', function (Blueprint $table) {
            $table->boolean('activity_mood')->default(0);
        });

        Schema::table('lockers', function (Blueprint $table) {
            $table->boolean('locker_activate')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('activity_mood');
        });

        Schema::table('lockers', function (Blueprint $table) {
            $table->dropColumn('locker_activate');
        });
    }
};
