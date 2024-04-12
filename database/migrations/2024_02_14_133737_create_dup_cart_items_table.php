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
        Schema::create('dup_cart_items', function (Blueprint $table) {
            $table->id('cart_item_id');
            $table->unsignedBigInteger('product_id');
            $table->string('product_name');
            $table->unsignedInteger('product_quantity');
            $table->decimal('product_amount', 10, 2);
            $table->unsignedBigInteger('cart_id');
            $table->timestamps();

            $table->foreign('cart_id')->references('cart_id')->on('dup_carts')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dup_cart_items');
    }
};
