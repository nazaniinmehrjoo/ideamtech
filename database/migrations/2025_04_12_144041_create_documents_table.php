<?php
// database/migrations/xxxx_xx_xx_create_documents_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('owner_code');           
            $table->string('doc_type_code');        
            $table->integer('serial_number');       
            $table->integer('revision_number');     
            $table->string('file_path');           
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}

