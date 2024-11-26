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
    Schema::create('order_items', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('order_id'); // Reference to the orders table
        $table->unsignedBigInteger('item_id');  // Reference to the items table
        $table->integer('quantity');           // Quantity ordered
        $table->decimal('price', 10, 2);       // Price at the time of order
        $table->timestamps();

        // Foreign keys to link orders and items
        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
