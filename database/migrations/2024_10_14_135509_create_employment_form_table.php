<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_forms', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); 
            $table->string('last_name');  
            $table->enum('gender', ['male', 'female']);  
            $table->enum('marital_status', ['single', 'married']);  
            $table->enum('military_status', ['completed', 'exempt', 'postponed']);  
            $table->string('phone');  
            $table->string('email'); 
            $table->string('location');  
            $table->integer('experience_years');  
            $table->text('education_history');  
            $table->text('training_courses')->nullable();  
            $table->string('training_certificate')->nullable();  
            $table->text('work_experience')->nullable();  
            $table->string('work_experience_photo')->nullable();  
            $table->string('foreign_language');
            $table->integer('language_proficiency')->unsigned();  
            $table->text('software_skills')->nullable();
            $table->text('about_me')->nullable();  
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
        Schema::dropIfExists('employment_form');
    }
}
