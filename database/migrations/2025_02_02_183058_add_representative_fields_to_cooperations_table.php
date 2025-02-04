<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRepresentativeFieldsToCooperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cooperations', function (Blueprint $table) {
            $table->string('representative_first_name')->after('activity_field');
            $table->string('representative_last_name')->after('representative_first_name');
            $table->string('representative_phone')->after('representative_last_name');
        });
    }

    public function down()
    {
        Schema::table('cooperations', function (Blueprint $table) {
            $table->dropColumn(['representative_first_name', 'representative_last_name', 'representative_phone']);
        });
    }

}
