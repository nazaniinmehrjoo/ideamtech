<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('name'); 
            $table->unsignedBigInteger('category_id');
            $table->json('description')->nullable(); // Change to JSON for multilingual support
            $table->string('image')->nullable();
            $table->string('page_name');
            $table->integer('views')->default(0);
            $table->integer('clicks')->default(0);
            
            // Add fields for chart metrics
            $table->integer('total_cost')->nullable();
            $table->integer('energy_consumption')->nullable();
            $table->integer('production_variety')->nullable();
            $table->integer('occupied_area')->nullable();
            $table->integer('drying_time')->nullable();
            $table->integer('maintenance_cost')->nullable();
            $table->integer('product_quality')->nullable();
            $table->integer('operation_cost')->nullable();
            $table->integer('machine_quality')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
