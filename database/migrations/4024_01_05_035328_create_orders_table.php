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
        if (!Schema::hasTable('table_order')) {
            Schema::create('table_order', function (Blueprint $table) {
                $table->id();
<<<<<<< HEAD
=======
                $table->foreignId('user_id')->references('id')->on('users');
>>>>>>> 6068a86ffb2c8eeb397413ad0bee59501a36c249
                $table->foreignId('menu_id')->references('id')->on('table_menu');
                $table->integer('quantity');
                $table->integer('menu_price')->references('menu_price')->on('table_menu');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_order');
    }
};
