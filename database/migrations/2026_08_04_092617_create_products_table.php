<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->foreignId('model_id')->constrained('asset_models')->onDelete('cascade');
            $table->char('serial_no', 100)->unique();
            $table->char('project_serial_no', 100)->unique();
            $table->string('position')->nullable();
            $table->text('user_description')->nullable();
            $table->text('remarks')->nullable();
            $table->softDeletes(); // Optional: if you want to implement soft deletes
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
