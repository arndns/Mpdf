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
        if (!Schema::hasTable('table_detail_order')) {
            Schema::create('table_detail_order', function (Blueprint $table) {
                $table->id();
                $table->foreignId('users_id')->references('id')->on('orders');
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
        Schema::dropIfExists('table_detail_order');
    }
};