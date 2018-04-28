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
            $table->date('production_year');
            $table->string('wheel');
            $table->string('dump_truck');
            $table->float('carrying');
            $table->boolean('make_now')->nullable();
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
