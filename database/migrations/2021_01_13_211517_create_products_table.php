<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'));
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->char('merchant', 36);
            $table->enum('currency', ['USD', 'NGN', "EUR"])->default('USD');
            $table->double('price', 8, 2)->default(0);
            $table->integer('unit');
            $table->integer('available');
            $table->integer('sold');
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
        Schema::dropIfExists('products');
    }
}
