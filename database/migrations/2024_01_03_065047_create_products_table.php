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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('product_name')->nullable();
            $table->string('slug_product_name')->nullable();
            $table->string('amount')->nullable();  
            $table->string('product_image')->nullable();
            $table->integer('product_status')->default(1);
            $table->integer('product_delete')->default(1);
            $table->string('date')->nullable();
            $table->timestamps();
        });
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
