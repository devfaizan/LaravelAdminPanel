<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('order_status')->default('pending');
            $table->decimal('order_amount', 10, 2)->default(0);
            $table->integer('customer_id');
            $table->unsignedBigInteger('cart_id');

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('cart_id')->references('cart_id')->on('dup_carts')->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

