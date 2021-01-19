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
                'id' => '025eeda9-55ff-11eb-b430-b46921043e18',
                'shop_name' => 'Successtar Shop',
                'shop_description' => 'Home of all your fashion wears',
                'first_name' => 'Successtar',
                'last_name' => 'Olawale',
                'phone' => '333333333',
                'address' => '4 online way',
                'city' => 'Bemake',
                'state' => 'London',
                'country' => 'UK',
                'zip' => '',
                'email' => 'osanyinpejuhammed35@gmail.com',
                'role' => 'merchant',
                'currency' => 'USD',
                'status' => 'ACTIVE',
                'account_balance' => 128.8,
                'dispatch_balance' => 19.0,
                'email_verified_at' => '2021-01-13 23:25:30',
                'password' => '$2y$10$1X7hfyq6felGeTKdRcE5se5/ezAal6kPTN20EJ8b4HGGDo9F06D/O',
                'remember_token' => NULL,
                'slug' => 'successtar-shop',
                'created_at' => '2021-01-14 00:25:30',
                'updated_at' => '2021-01-19 08:58:30',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => '445eeda9-55ff-11eb-b430-b46921043e18',
                'shop_name' => 'Jumga',
                'shop_description' => 'Jumga Admin',
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'phone' => '333333333',
                'address' => '2 successtar way',
                'city' => 'Lekki',
                'state' => 'Lagos',
                'country' => 'NG',
                'zip' => '',
                'email' => 'admin@jumga.com',
                'role' => 'admin',
                'currency' => 'USD',
                'status' => 'ACTIVE',
                'account_balance' => 32.2,
                'dispatch_balance' => 0.0,
                'email_verified_at' => '2021-01-13 23:25:30',
                'password' => '$2y$10$xVMei/3NU0YbKXwnBBOcT.snfg7L9VBk7IyaynAibb82IH8CqO13a',
                'remember_token' => NULL,
                'slug' => 'admin',
                'created_at' => '2021-01-13 23:25:30',
                'updated_at' => '2021-01-19 08:58:30',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 'a11469b2-f780-49c4-9dab-c7cdd9236423',
                'shop_name' => 'Quality Hub',
                'shop_description' => 'Quality wears at affordable price',
                'first_name' => 'Test',
                'last_name' => 'Test',
                'phone' => '123456789',
                'address' => 'test street',
                'city' => 'Accra',
                'state' => 'Accra',
                'country' => 'GH',
                'zip' => NULL,
                'email' => 'test@test.com',
                'role' => 'merchant',
                'currency' => 'USD',
                'status' => 'ACTIVE',
                'account_balance' => 0.0,
                'dispatch_balance' => 0.0,
                'email_verified_at' => '2021-01-19 06:11:45',
                'password' => '$2y$10$uJfh/KUpUWE6isOpD2hjveGg2NOQMIH5RqVrWCK7qMVS1Eko2yU22',
                'remember_token' => 'Bvs8nA7IS3XhUP6wmvW7AYILI3Imq0l4Zu4RAzRYb2VGL5ElTN5jcyCcLK72',
                'slug' => 'quality-hub',
                'created_at' => '2021-01-19 06:11:02',
                'updated_at' => '2021-01-19 06:13:21',
                'deleted_at' => NULL,
            ),
        ));


    }
}
