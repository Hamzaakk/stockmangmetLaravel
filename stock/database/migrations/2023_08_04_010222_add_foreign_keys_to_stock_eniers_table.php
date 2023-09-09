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
        Schema::table('stock_eniers', function (Blueprint $table) {
            Schema::table('stock_eniers', function (Blueprint $table) {
                // Drop the original foreign key constraints
                $table->dropForeign(['product_id']);
                $table->dropForeign(['fornisseur_id']);
                $table->dropForeign(['lieux_id']);
    
                // Add new deferrable foreign key constraints with ON UPDATE CASCADE
                $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->deferrable();
                $table->foreign('fornisseur_id')->references('id')->on('fornisseurs')->onUpdate('cascade')->deferrable();
                $table->foreign('lieux_id')->references('id')->on('lieu_stocks')->onUpdate('cascade')->deferrable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_eniers', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['fornisseur_id']);
            $table->dropForeign(['lieux_id']);

            // Add back the original foreign key constraints
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('fornisseur_id')->references('id')->on('fornisseurs');
            $table->foreign('lieux_id')->references('id')->on('lieu_stocks');
       
        });
    }
};
