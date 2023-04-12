<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone');
            $table->string('address1');
            $table->string('address2')->default(null);
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pincode');
            $table->longInteger('total_price')->default(null);
            $table->string('payment_mode')->default(null);
            $table->string('payment_id')->default(null);
            $table->tinyInteger('status')->default('0');
            $table->string('message')->default(null);
            $table->string('tracking_no');  //randomely
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
        Schema::dropIfExists('orders');
    }
}
