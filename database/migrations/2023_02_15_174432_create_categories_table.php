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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('Cat_ID');
            $table->string('Cat_title', 100);
            $table->string('Cat_Description');
            $table->string('Cat_image')->nullable();
            $table->unsignedBigInteger('User_ID'); //Reffers to the ID of table "Users"
            $table->foreign('User_ID')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('categories');
    }
};
