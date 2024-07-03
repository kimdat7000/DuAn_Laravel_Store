<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vnpay_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('order_id');
            $table->string('transaction_ref');
            $table->decimal('amount', 15, 2);
            $table->string('payment_url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vnpay_transactions');
    }

    /**
     * Reverse the migrations.
     */
};
