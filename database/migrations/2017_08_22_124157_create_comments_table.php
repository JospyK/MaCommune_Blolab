<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('commnent');
            $table->integer('userapp_id')->unsigned();
            $table->integer('action_id')->unsigned();
            $table->timestamps();

        });
        Schema::table('comments', function ($table) {
            $table->foreign('userapp_id')->references('id')->on('userapp')->onDelete('cascade');
            $table->foreign('action_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['userapp_id']);
            $table->dropForeign(['action_id']);
        });
        Schema::dropIfExists('comments');
    }
}
