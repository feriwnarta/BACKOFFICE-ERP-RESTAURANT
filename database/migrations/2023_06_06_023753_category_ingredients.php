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
        //for structure DB
        Schema::create("category_ingredients",function (Blueprint $table){
            $table->string("uuid_category");
            $table->string("category_name");
            $table->string("created_by");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //for rollback
        Schema::dropIfExists("category_ingredients");
    }
};
