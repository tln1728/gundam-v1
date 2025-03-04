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
        Schema::create('users_vouchers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Khóa ngoại users
            $table->foreignId('voucher_id')->constrained('vouchers')->onDelete('cascade'); // Khóa ngoại vouchers
            $table->timestamp('used_at')->nullable(); // Lưu thời gian dùng voucher
            $table->timestamps();

            $table->unique(['user_id', 'voucher_id']);// Đảm bảo mỗi user chỉ nhận 1 voucher 1 lần
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_vouchers');
    }
};
