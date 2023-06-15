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
        Schema::create('purchase_order_detail',function (Blueprint $table){
            $table->string("uuid_po_detail")->primary();
            $table->string("uuid_po");
            $table->string("item");
            $table->bigInteger("item_price");
            $table->integer("order");
            $table->integer("stock");
            $table->string("unit");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('purchase_order_detail');
    }
};
