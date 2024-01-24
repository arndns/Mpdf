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
        if (!Schema::hasTable('table_purchase')) {
            Schema::create('table_purchase', function (Blueprint $table) {
                $table->id();
<<<<<<< HEAD
                $table->foreignId('customer_id')->references('id')->on('table_order');
=======
                $table->foreignId('user_id')->references('id')->on('table_order');
>>>>>>> 6068a86ffb2c8eeb397413ad0bee59501a36c249
                $table->foreignId('order_id')->references('id')->on('table_order');
                $table->integer('total');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_purchase');
    }
};