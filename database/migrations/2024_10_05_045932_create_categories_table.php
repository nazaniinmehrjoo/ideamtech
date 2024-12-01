<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('page_name');
            $table->json('description')->nullable();
            $table->integer('total_cost')->nullable();
            $table->integer('energy_consumption')->nullable();
            $table->integer('production_variety')->nullable();
            $table->integer('drying_time')->nullable();
            $table->integer('maintenance_cost')->nullable();
            $table->integer('operation_cost')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
