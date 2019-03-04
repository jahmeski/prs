<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalInfoToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('agency_id')->unsigned()->nullable();
            $table->string('position')->nullable();
            $table->integer('user_type_id')->unsigned();
            $table->foreign('agency_id')->references('id')->on('agencies');
            $table->foreign('user_type_id')->references('id')->on('user_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('agency_id');
            $table->dropColumn('position');
            $table->dropColumn('user_type_id');
        });
    }
}
