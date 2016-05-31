<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class  CreateScoresTable  extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores',function(Blueprint $table){
            $table->increments('id');
            $table->integer('artistic_quality');
            $table->integer('originality');
            $table->integer('production_quality_music');
            $table->integer('market_potential');
            $table->integer('production_quality_video');
            $table->integer('artistic_direction');
            $table->integer('facebook');
            $table->integer('twitter');
            $table->integer('instagram');
            $table->integer('quality_text');
            $table->integer('quality_photos');
            $table->integer('technical_information');
            $table->integer('pitch');
            $table->integer('showcase');

            $table->integer('group_id')->unsigned();
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
        Schema::drop('scores');
    }
}
