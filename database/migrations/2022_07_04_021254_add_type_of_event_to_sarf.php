<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeOfEventToSarf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sarves', function (Blueprint $table) {
            $table->string('typeOfTheEvent')->default('General');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sarves', function (Blueprint $table) {
            $table->string('typeOfTheEvent')->default('General');
        });
    }
}
