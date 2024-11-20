<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMetricsToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('total_cost')->nullable();
            $table->integer('energy_consumption')->nullable();
            $table->integer('production_variety')->nullable();
            $table->integer('drying_time')->nullable();
            $table->integer('maintenance_cost')->nullable();
            $table->integer('operation_cost')->nullable();
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn([
                'total_cost',
                'energy_consumption',
                'production_variety',
                'drying_time',
                'maintenance_cost',
                'operation_cost',
            ]);
        });
    }

}
