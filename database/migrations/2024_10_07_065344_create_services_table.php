<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->nullable(); 
            $table->text('content')->nullable();
            $table->json('banner_images')->nullable(); 
            $table->integer('views')->default(0);
            $table->integer('clicks')->default(0);
            $table->boolean('show_on_consulting')->default(false); 
            $table->boolean('show_on_parts_repairs')->default(false); 
            $table->boolean('show_on_engineering')->default(false); 
            $table->boolean('show_on_installation')->default(false); 
            $table->boolean('show_on_after_sales')->default(false); 

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
        Schema::dropIfExists('services');
    }
}
