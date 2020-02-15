<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesisSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis_supervisors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('thesis_id');
            $table->unsignedBigInteger('lecturer_id');
            $table->integer('position')->default(0);
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('thesis_id')->references('id')->on('theses');
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thesis_supervisors');
    }
}
