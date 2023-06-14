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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('comments');
            $table->date('Date');
            $table->unsignedBigInteger('U_Id'); //Reffers to the ID of table "Users"
            $table->foreign('U_Id')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('musicId'); //Reffers to the ID of table "Uploads"
            $table->foreign('musicId')->references('id')->on('uploads')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
};
