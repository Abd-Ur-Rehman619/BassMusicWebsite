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
        Schema::create('news', function (Blueprint $table) {
            $table->id('News_ID');
            $table->string('News_Title', 100);
            $table->string('News_Description');
            $table->date('News_Date');
            $table->string('news_image')->nullable();
            $table->unsignedBigInteger('UID'); //Reffers to the ID of table "Hostel Timings"
            $table->foreign('UID')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('news');
    }
};
