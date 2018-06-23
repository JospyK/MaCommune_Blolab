<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('budget');
            $table->string('sourcefinancement');
            $table->string('localisation');
            $table->string('image')->nullable();
            $table->text('description');
            $table->date('start');
            $table->date('end');
            $table->integer('commune_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('commune_id')->references('id')->on('communes');
            $table->foreign('category_id')->references('id')->on('action_categories');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions');
    }
}
