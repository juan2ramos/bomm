<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function($table)
        {

            $table->text('video1');
            $table->text('video2');
            $table->text('video3');
            $table->text('audio1');
            $table->text('audio2');
            $table->text('audio3');
            $table->string('producer');

            $table->string('services');
            $table->string('check1');
            $table->string('check2');

            /* Step Two*/


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
