<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('targets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('first_quarter')->nullable();
            $table->integer('second_quarter')->nullable();
            $table->integer('third_quarter')->nullable();
            $table->integer('fourth_quarter')->nullable();
            $table->integer('total')->nullable();
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
        Schema::table('targets', function (Blueprint $table) {
            $table->dropForeign('targets_performance_indicator_id_foreign');
        });

        Schema::dropIfExists('targets');
    }
}
