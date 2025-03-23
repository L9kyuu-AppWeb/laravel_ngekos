<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boarding_house_id');
            $table->string('name', 100);
            $table->string('room_type', 50);
            $table->integer('square_feet');
            $table->integer('capacity');
            $table->decimal('price_per_month', 10, 2);
            $table->boolean('is_available')->default(true);
            $table->timestamps();
            $table->softDeletes(); // Menambahkan soft delete

            $table->foreign('boarding_house_id')->references('id')->on('boarding_houses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};

