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
        //create schema

        Schema::create('purchase_order',function (Blueprint $table){
            $table->string('uuid_po')->primary();
            $table->string('uuid_supplier');
            $table->string('uuid_outlet');
            $table->string('order_number');
            $table->string('created_by');
            $table->string('created_date');
            $table->bigInteger('total');
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('purchase_order');
    }
};
