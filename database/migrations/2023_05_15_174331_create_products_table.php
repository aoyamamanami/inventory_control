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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->default(0);
            $table->string('company')->default('');
            $table->string('name')->default('');
            $table->integer('unit_price')->default(0);
            $table->integer('quantity')->default(0);
            $table->unsignedBigInteger('product_code')->default(0);
            $table->foreignId('user_id')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
