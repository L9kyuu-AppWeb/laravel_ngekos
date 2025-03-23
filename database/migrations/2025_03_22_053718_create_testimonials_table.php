<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('boarding_house_id')->constrained('boarding_houses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('photo')->nullable();
            $table->text('content');
            $table->unsignedTinyInteger('rating')->comment('Rating 1-5');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
};

