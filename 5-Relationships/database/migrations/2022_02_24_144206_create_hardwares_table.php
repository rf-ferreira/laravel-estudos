<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardwares', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand');
            $table->unsignedBigInteger('type');
            $table->string('name');
            $table->float('price', 9, 2);
            $table->timestamps();

            $table->foreign('brand')->references('id')->on('hardware_brands');
            $table->foreign('type')->references('id')->on('hardware_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hardwares');
    }
};
