<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarves', function (Blueprint $table) {
            $table->id();
            $table->date('dateOfApplication');
            $table->string('nameOfRepresentative');
            $table->string('titleOfTheEvent');
            $table->string('generalObjective');
            $table->date('dateOfEvent');
            $table->integer('hoursDuration');
            $table->time('startOfEvent');
            $table->time('endOfEvent');
            $table->integer('numOfParticipant');
            $table->string('venueOfEvent');
            $table->integer('amountAllocated');
            $table->string('sourceOfFunds');
            $table->foreignId('organization_id')->references('id')->on('users')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('sarves');
    }
}
