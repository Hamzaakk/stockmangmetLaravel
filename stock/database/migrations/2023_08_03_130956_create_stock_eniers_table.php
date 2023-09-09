<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_eniers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');        
            $table->unsignedBigInteger('fornisseur_id');
            $table->foreign('fornisseur_id')->references('id')->on('fornisseurs'); 
            $table->unsignedBigInteger('lieux_id');
            $table->foreign('lieux_id')->references('id')->on('lieu_stocks'); 
            $table->unsignedBigInteger('quantité');
            $table->unsignedBigInteger('priceforOne');
            $table->unsignedBigInteger('total')->nullable();
            $table->string('status',33)->nullable();
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_eniers');
    }
};
