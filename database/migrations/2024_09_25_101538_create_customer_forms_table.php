<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerFormsTable extends Migration
{
    public function up()
    {
        Schema::create('customer_forms', function (Blueprint $table) {
            $table->id(); 
            $table->string('factory_code'); 
            $table->string('factory_name'); 
            $table->string('first_name'); 
            $table->string('last_name'); 
            $table->string('factory_phone');
            $table->string('mobile_phone');
            $table->string('province'); 
            $table->string('city'); 
            $table->string('address');
            $table->json('products'); 
            $table->string('kiln_type');
            $table->string('dryer_type');
            $table->integer('dough_count');
            $table->json('messenger')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_forms');
    }
}

