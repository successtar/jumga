<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'));
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->enum('role', ['admin', 'merchant', "dispatcher"])->default('merchant');
            $table->enum('currency', ['USD', 'NGN', "EUR"])->default('USD');
            $table->enum('status', ['ACTIVE', 'PENDING', "DELETED"])->default('PENDING');
            $table->double('balance', 8, 2)->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
