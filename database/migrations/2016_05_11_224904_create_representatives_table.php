<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representatives',function(Blueprint $table){
            $table->increments('id');
            $table->string('name_representative');
            $table->string('image_representative');
            $table->string('last_name_representative');
            $table->string('identification_representative');
            $table->string('identification_number_representative');
            $table->string('gender_representative');
            $table->string('day_representative');
            $table->string('month_representative');
            $table->string('year_representative');
            $table->string('country_representative');
            $table->string('state_representative');
            $table->string('city_representative');
            $table->string('address_Representative');
            $table->string('phone_Representative');
            $table->boolean('public_phone');
            $table->string('nameRepresentative');
            $table->string('mobile_representative');
            $table->boolean('public_mobile_representative');
            $table->string('email_representative');
            $table->boolean('public_email');
            $table->string('email_alternative_representative');
            $table->boolean('public_email_alternative');
            $table->boolean('sms_authorize');
            $table->string('level_education_representative');
            $table->boolean('is_company');
            $table->string('company_representative');
            $table->string('nit_company');
            $table->string('position_company');

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
        //
    }
}
