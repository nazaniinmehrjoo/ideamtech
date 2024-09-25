<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_forms', function (Blueprint $table) {
            $table->id();
            $table->string('factory_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('factory_number');
            $table->string('mobile_number');
            $table->string('province');
            $table->string('city');
            $table->text('address');
            $table->json('products'); 
            $table->string('kiln_type');
            $table->string('drying_method');
            $table->integer('brick_count');
            $table->json('messaging_platforms')->nullable();
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
        Schema::dropIfExists('customer_forms');
    }
}
