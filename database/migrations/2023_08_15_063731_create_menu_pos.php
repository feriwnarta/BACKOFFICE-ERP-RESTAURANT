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
        Schema::create('menu_pos', function (Blueprint $table) {
            $table->string('uuid_menu_pos')->primary();
            $table->string('uuid_category');
            $table->string('menu_name');
            $table->string('img');
            $table->string('pricing');
            $table->integer('in_stock');
            $table->integer('min_stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_pos');
    }
};
