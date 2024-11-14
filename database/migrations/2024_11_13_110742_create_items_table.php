<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Item name
            $table->text('description')->nullable(); // Item description
            $table->string('supplier')->nullable();
            $table->decimal('price', 8, 2)->default(0)->unsigned(); // Item price
            $table->timestamps(); // Created at and updated at timestamps
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
