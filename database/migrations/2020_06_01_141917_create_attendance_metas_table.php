<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_metas', function (Blueprint $table) {
            $table->id();
            $table->uuid('att_id');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->string('duration')->nullable();
            $table->char('active', 1);
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
        Schema::dropIfExists('attendance_metas');
    }
}
