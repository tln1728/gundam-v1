<?php

use App\Models\Variant;
use App\Models\VariantValue;
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
        Schema::create('pivot_vv', function (Blueprint $table) {
            // pivot cho bảng variants và variant_values
            $table->id();
            $table->foreignIdFor(Variant::class)->constrained()->onDelete('cascade');;
            $table->foreignIdFor(VariantValue::class)->constrained();
            $table->unique(['variant_id', 'variant_value_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_vv');
    }
};
