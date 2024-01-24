<?php
<<<<<<< HEAD
=======

>>>>>>> 6068a86ffb2c8eeb397413ad0bee59501a36c249
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
        // Pengecekan apakah tabel sudah ada sebelum membuatnya
        if (!Schema::hasTable('table_menu')) {
            Schema::create('table_menu', function (Blueprint $table) {
                $table->id();
                $table->string('menu_pic')->nullable();
                $table->foreignId('category_id')->references('id')->on('table_category');
<<<<<<< HEAD
                $table->foreignId('users_id')->nullable(false)->references('id')->on('users'); // Tambahkan nullable(false)
=======
>>>>>>> 6068a86ffb2c8eeb397413ad0bee59501a36c249
                $table->string('menu_name');
                $table->integer('menu_price');
                $table->string('menu_desc');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_menu');
    }
<<<<<<< HEAD
};
=======
};
>>>>>>> 6068a86ffb2c8eeb397413ad0bee59501a36c249
