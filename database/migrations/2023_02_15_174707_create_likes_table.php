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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->enum('state' , ['NULL','Liked' , 'Unliked'])->default('NULL');
            $table->unsignedBigInteger('likedBy'); //Reffers to the ID of table "Users"
            $table->foreign('likedBy')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('music_ID'); //Reffers to the ID of table "Uploads"
            $table->foreign('music_ID')->references('id')->on('uploads')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('likes');
    }
};
