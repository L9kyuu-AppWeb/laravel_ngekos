<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->unsignedBigInteger('boarding_house_id');
            $table->unsignedBigInteger('room_id');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phone_number', 20);
            $table->string('payment_method', 50);
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->date('start_date');
            $table->integer('duration');
            $table->decimal('total_amount', 10, 2);
            $table->timestamp('transaction_date')->useCurrent();
            $table->string('snap_token', 255)->nullable();
            $table->timestamps();
            $table->softDeletes(); // Menambahkan soft delete

            $table->foreign('boarding_house_id')->references('id')->on('boarding_houses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};

