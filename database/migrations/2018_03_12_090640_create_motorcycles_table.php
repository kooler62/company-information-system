<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotorcyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motorcycles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand');
            $table->string('engine');
            $table->string('color');
            $table->string('transmission');
            $table->date('production_year')->nullable();
            //з коляскою
            $table->boolean('stroller');
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
        Schema::dropIfExists('motorcycles');
    }
}
