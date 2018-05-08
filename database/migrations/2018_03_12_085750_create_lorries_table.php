<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLorriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lorries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand');
            $table->string('engine');
            $table->string('color');
            $table->string('transmission');
            $table->date('production_year')->nullable();
            //колесна база
            $table->string('wheel');
            //самоскид
            $table->string('dump_truck');
            //грузопідйомність
            $table->float('carrying');
            $table->boolean('make_now');
            $table->integer('workshop_id');
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
        Schema::dropIfExists('lorries');
    }
}
