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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id('stock_id');
            $table->date('purchase_date');
            $table->date('expire_date');
            $table->integer('quantity');
            $table->decimal('cost_price', 10, 2);
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('last_update_by')->nullable();
            $table->unsignedBigInteger('supplier_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};