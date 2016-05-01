<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('type_proposal');
            $table->string('other_proposal');
            $table->string('genre');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('show_cost');
            $table->string('manager');
            $table->boolean('showcases');
            $table->string('image');
            $table->string('pdf');
            $table->text('short_review');
            $table->integer('user_id')->unsigned();
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
        Schema::drop('groups');
    }
}
