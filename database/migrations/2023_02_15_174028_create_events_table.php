<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('Event_ID');
            $table->string('Event_Title', 100);
            $table->string('Event_Description');
            $table->date('Event_Date');
            $table->string('event_image')->nullable();
            $table->string('location', 100);
            $table->unsignedBigInteger('userID'); //Reffers to the ID of table "Hostel Timings"
            $table->foreign('userID')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('events');
    }
};
