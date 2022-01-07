<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->integer('qty_buy');
            $table->integer('price');
            $table->string('start_airport');
            $table->string('end_airport');
            $table->date('date');
            $table->integer('time');
            $table->integer('time_stop');
            $table->text('slot_1');
            $table->text('slot_2');
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
        Schema::dropIfExists('schedules');
    }
}
