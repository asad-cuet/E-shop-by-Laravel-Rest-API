<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('favicon');
            $table->string('title');
            $table->string('name');
            $table->longText('footer_descript');
            $table->string('nav_color');
            $table->string('body_color');
            $table->string('banner_image1');
            $table->string('banner_image2');
            $table->string('banner_image3');
            $table->string('meta_title');
            $table->longText('meta_keywords');
            $table->longText('meta_descript');
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
        Schema::dropIfExists('settings');
    }
}
