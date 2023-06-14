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
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('music');
            $table->date('date');
            $table->string('title');
            $table->unsignedBigInteger('Author'); //Reffers to the ID of table "Users"
            $table->foreign('Author')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('catId'); //Reffers to the ID of table "Categories"
            $table->foreign('catId')->references('Cat_ID')->on('categories')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('uploads');
    }
};
