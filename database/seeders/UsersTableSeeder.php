<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->delete();

        DB::table('users')->insert(array (
            0 =>
            array (
                'id' => '445eeda9-55ff-11eb-b430-b46921043e18',
                'shop_name' => 'Jumga',
                'shop_description' => 'Jumga Admin',
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'phone' => '333333333',
                'email' => 'admin@jumga.com',
                'role' => 'admin',
                'currency' => 'USD',
                'status' => 'ACTIVE',
                'account_balance' => 0,
                'dispatch_balance' => 0,
                'email_verified_at' => '2021-01-13 23:25:30',
                'address' => '2 successtar way',
                'city' => 'Lekki',
                'state' => 'Lagos',
                'country' => 'NG',
                'zip' => '',
                'password' => '$2y$10$xVMei/3NU0YbKXwnBBOcT.snfg7L9VBk7IyaynAibb82IH8CqO13a',
                'remember_token' => NULL,
                'slug' => 'admin',
                'created_at' => '2021-01-13 23:25:30',
                'updated_at' => '2021-01-18 06:08:52',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => '025eeda9-55ff-11eb-b430-b46921043e18',
                'shop_name' => 'Successtar Shop',
                'shop_description' => 'Home of all your fashion wears',
                'first_name' => 'Successtar',
                'last_name' => 'Olawale',
                'phone' => '333333333',
                'email' => 'osanyinpejuhammed35@gmail.com',
                'role' => 'merchant',
                'currency' => 'USD',
                'status' => 'ACTIVE',
                'account_balance' => 0,
                'dispatch_balance' => 0,
                'email_verified_at' => '2021-01-13 23:25:30',
                'address' => '4 online way',
                'city' => 'Bemake',
                'state' => 'London',
                'country' => 'UK',
                'zip' => '',
                'password' => '$2y$10$1X7hfyq6felGeTKdRcE5se5/ezAal6kPTN20EJ8b4HGGDo9F06D/O',
                'remember_token' => NULL,
                'slug' => 'successtar-shop',
                'created_at' => '2021-01-14 00:25:30',
                'updated_at' => '2021-01-18 06:08:52',
                'deleted_at' => NULL,
            ),
        ));


    }
}
