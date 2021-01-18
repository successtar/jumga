<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->enum('currency', ['USD', 'NGN', "EUR"])->default('USD');
            $table->double('amount', 8, 2);
            $table->double('jumga_fee', 8, 2);
            $table->double('dispatch', 8, 2);
            $table->double('total', 8, 2);
            $table->char('user_id', 36);
            $table->char('transaction_id', 36);
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zip')->nullable();
            $table->enum('status', ['RECEIVED', 'CONFIRMED', 'DISPATCHED', 'DELIVERED'])->default('RECEIVED');
            $table->json('items');
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
        Schema::dropIfExists('orders');
    }
}
