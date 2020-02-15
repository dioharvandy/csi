<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('class_lecturer_id');
            $table->integer('meeting_no');
            $table->text('topics')->nullable();
            $table->date('date');
            $table->time('start_at')->nullable();
            $table->time('end_at')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->integer('status');
            ///Masuk Geofence
            $table->string('model_in')->nullable();
            $table->string('manufacturer_in')->nullable();
            $table->string('osver_in')->nullable();
            $table->time('check_in_time')->nullable();
            $table->point('latlong_in')->nullable();
            #$table->double('long_in')->nullable();
            //Keluar Geofence
            $table->string('model_out')->nullable();
            $table->string('manufacturer_out')->nullable();
            $table->string('osver_out')->nullable();
            $table->time('check_out_time')->nullable();
            $table->point('latlong_out')->nullable();
            #$table->double('long_out')->nullable();
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('class_lecturer_id')->references('id')->on('class_lecturers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
