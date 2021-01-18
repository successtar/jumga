<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'))->primary();
            $table->string('email');
            $table->enum('currency', ['USD', 'NGN', "EUR"])->default('USD');
            $table->double('amount', 8, 2);
            $table->char('gateway_ref', 36);
            $table->char('user_id', 36);
            $table->enum('category', ['INCOMING', 'OUTGOING']);
            $table->enum('status', ['PENDING', 'COMPLETED'])->default('PENDING');
            $table->enum('type', ['ORDER', 'SHOP_FEE']);
            $table->string('description')->nullable();
            $table->json('meta')->nullable();
            $table->json('log')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
