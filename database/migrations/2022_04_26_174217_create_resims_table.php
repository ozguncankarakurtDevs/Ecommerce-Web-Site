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
        Schema::create('resims', function (Blueprint $table) {
            $table->increments('ResimID');
            $table->integer('UrunID');
            $table->string('Resim1',50);
            $table->string('Resim2',50);
            $table->string('Resim3',50);
            $table->string('Resim4',50);
            $table->string('Resim5',50);
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
        Schema::dropIfExists('resims');
    }
};
