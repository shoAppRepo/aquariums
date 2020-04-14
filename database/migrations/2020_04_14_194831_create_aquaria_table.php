<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAquariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aquaria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('area_id');
            $table->string('address')->nullable();
            $table->string('url')->nullable();
            $table->string('content')->nullable();
            $table->string('hour')->nullable();
            $table->string('show')->nullable();
            $table->string('admission')->nullable();
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
        Schema::dropIfExists('aquaria');
    }
}
