<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_indicators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('agency_id')->unsigned();
            $table->integer('year_id')->unsigned();
            $table->timestamps();

            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('performance_indicators', function (Blueprint $table) {
            $table->dropForeign('performance_indicators_agency_id_foreign');
            $table->dropForeign('performance_indicators_year_id_foreign');
        });
        
        Schema::dropIfExists('performance_indicators');
    }
}
