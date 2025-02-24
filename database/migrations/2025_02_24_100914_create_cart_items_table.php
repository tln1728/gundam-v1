<?php

use App\Models\Product;
use App\Models\User;
use App\Models\Variant;
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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class) -> constrained() -> cascadeOnDelete();
            $table->foreignIdFor(Product::class) -> constrained() -> cascadeOnDelete();
            $table->foreignIdFor(Variant::class) -> nullable() -> constrained() -> cascadeOnDelete();
            $table->string('variant_name');
            $table->string('sku');
            $table->decimal('product_price',11,2);
            $table->decimal('extra_price',11,2) -> default(0);
            $table->unsignedInteger('quantity') -> default(1);
            $table->json('attributes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
