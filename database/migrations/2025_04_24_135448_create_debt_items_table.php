<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('debt_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('debt_id')->constrained()->onDelete('cascade');
            $table->foreignId('business_id')->after('id')->constrained('businesses')->onDelete('cascade');
            $table->string('product_name');
            $table->string('description')->nullable();
            $table->decimal('active_price', 10, 2)->nullable();
            $table->decimal('price', 10, 2);
             $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dedt_items');
    }
};
