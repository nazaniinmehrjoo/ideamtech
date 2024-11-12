<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChartMetricsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('total_cost')->nullable();
            $table->integer('energy_consumption')->nullable();
            $table->integer('production_variety')->nullable();
            $table->integer('occupied_area')->nullable();
            $table->integer('drying_time')->nullable();
            $table->integer('maintenance_cost')->nullable();
            $table->integer('product_quality')->nullable();
            $table->integer('operation_cost')->nullable();
            $table->integer('machine_quality')->nullable();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'total_cost',
                'energy_consumption',
                'production_variety',
                'occupied_area',
                'drying_time',
                'maintenance_cost',
                'product_quality',
                'operation_cost',
                'machine_quality',
            ]);
        });
    }
}
