<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignalementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signalements', function (Blueprint $table) {
            $table->increments('id');
            $table->text('message');
            $table->string('contact');
            $table->string('image')->nullable();
            $table->integer('signalement_category_id')->unsigned();
            $table->integer('commune_id')->unsigned();
            $table->timestamps();

            $table->foreign('commune_id')->references('id')->on('communes');
            $table->foreign('signalement_category_id')->references('id')->on('signalement_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signalements');
    }
}
