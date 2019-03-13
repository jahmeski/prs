<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remarks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('remarks');
            $table->integer('performance_indicator_id')->unsigned();
            $table->timestamps();

            $table->foreign('performance_indicator_id')->references('id')->on('performance_indicators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('remarks', function (Blueprint $table) {
            $table->dropForeign('remarks_performance_indicator_id_foreign');
        });
        
        Schema::dropIfExists('remarks');
    }
}
