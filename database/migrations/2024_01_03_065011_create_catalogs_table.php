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
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('catalog_name')->nullable();
            $table->string('slug_catalog_name')->nullable();
            $table->string('catalog_image')->nullable();
            $table->string('catalog_pdf')->nullable();
            $table->integer('catalog_status')->default(1);
            $table->integer('catalog_delete')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
