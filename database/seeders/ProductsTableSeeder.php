<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('products')->delete();

        DB::table('products')->insert(array (
            0 =>
            array (
                'id' => '04749a77-a1c4-41da-9658-3585a3fce0f2',
                'name' => 'Versace stuff',
                'description' => 'This is a cool and nice stuff. You will enjoy it.',
                'user_id' => '025eeda9-55ff-11eb-b430-b46921043e18',
                'image_path' => '/img/product-4.jpg',
                'currency' => 'USD',
                'price' => 50.0,
                'unit' => 3,
                'available' => 2,
                'sold' => 1,
                'created_at' => '2020-12-05 11:27:21',
                'updated_at' => '2020-12-18 06:08:53',
            ),
            1 =>
            array (
                'id' => '2528f0df-7a68-4aaa-bdda-19c4203a9170',
                'name' => 'Success Fabric',
                'description' => 'This is a cool and nice stuff. You will enjoy it.',
                'user_id' => '025eeda9-55ff-11eb-b430-b46921043e18',
                'image_path' => '/img/product-2.jpg',
                'currency' => 'USD',
                'price' => 60.0,
                'unit' => 7,
                'available' => 4,
                'sold' => 3,
                'created_at' => '2020-12-19 11:27:21',
                'updated_at' => '2020-12-14 11:27:21',
            ),
            2 =>
            array (
                'id' => '38965d22-7d58-4a4c-aa51-a5edc85b1afd',
                'name' => 'Gucci Fabric',
                'description' => 'This is a cool and nice stuff. You will enjoy it.',
                'user_id' => '025eeda9-55ff-11eb-b430-b46921043e18',
                'image_path' => '/img/product-2.jpg',
                'currency' => 'USD',
                'price' => 20.0,
                'unit' => 7,
                'available' => 6,
                'sold' => 1,
                'created_at' => '2020-12-26 11:27:21',
                'updated_at' => '2020-12-18 05:08:04',
            ),
            3 =>
            array (
                'id' => '4b5c1fdb-ea16-40b1-aac0-0051877a17b8',
                'name' => 'Togo Cloth',
                'description' => 'This is a cool and nice stuff. You will enjoy it.',
                'user_id' => '025eeda9-55ff-11eb-b430-b46921043e18',
                'image_path' => '/img/product-7.jpg',
                'currency' => 'USD',
                'price' => 54.0,
                'unit' => 6,
                'available' => 6,
                'sold' => 0,
                'created_at' => '2020-12-21 11:27:21',
                'updated_at' => '2020-12-20 11:27:21',
            ),
            4 =>
            array (
                'id' => '88d73726-0790-489d-8cd8-dfd838915039',
                'name' => 'Classy Fabric',
                'description' => 'This is a cool and nice stuff. You will enjoy it.',
                'user_id' => '025eeda9-55ff-11eb-b430-b46921043e18',
                'image_path' => '/img/product-8.jpg',
                'currency' => 'USD',
                'price' => 30.0,
                'unit' => 5,
                'available' => 5,
                'sold' => 0,
                'created_at' => '2020-12-26 11:27:21',
                'updated_at' => '2020-12-26 11:27:21',
            ),
            5 =>
            array (
                'id' => '94d4732b-6797-4cee-84fc-efec34c0e878',
                'name' => 'Chinko Cloth',
                'description' => 'This is a cool and nice stuff. You will enjoy it.',
                'user_id' => '025eeda9-55ff-11eb-b430-b46921043e18',
                'image_path' => '/img/product-3.jpg',
                'currency' => 'USD',
                'price' => 10.0,
                'unit' => 40,
                'available' => 39,
                'sold' => 1,
                'created_at' => '2020-12-20 11:27:21',
                'updated_at' => '2020-12-18 05:49:11',
            ),
            6 =>
            array (
                'id' => 'aba02254-0476-4805-87b5-9888f83a4b67',
                'name' => 'Flutter wear',
                'description' => 'This is a cool and nice stuff. You will enjoy it.',
                'user_id' => '025eeda9-55ff-11eb-b430-b46921043e18',
                'image_path' => '/img/product-6.jpg',
                'currency' => 'USD',
                'price' => 60.0,
                'unit' => 7,
                'available' => 5,
                'sold' => 2,
                'created_at' => '2020-12-27 11:27:21',
                'updated_at' => '2020-12-18 05:11:13',
            ),
            7 =>
            array (
                'id' => 'c4bc61bd-96fe-4bc8-b38a-a5b28473dbf1',
                'name' => 'Cool Cloth',
                'description' => 'This is a cool and nice stuff. You will enjoy it.',
                'user_id' => '025eeda9-55ff-11eb-b430-b46921043e18',
                'image_path' => '/img/product-5.jpg',
                'currency' => 'USD',
                'price' => 10.0,
                'unit' => 56,
                'available' => 50,
                'sold' => 6,
                'created_at' => '2020-12-28 11:27:21',
                'updated_at' => '2020-12-18 06:08:53',
            ),
            8 =>
            array (
                'id' => 'd133f20e-f199-4d85-888d-4c21510402e1',
                'name' => 'Naija Cloth',
                'description' => 'This is a cool and nice stuff. You will enjoy it.',
                'user_id' => '025eeda9-55ff-11eb-b430-b46921043e18',
                'image_path' => '/img/product-9.jpg',
                'currency' => 'USD',
                'price' => 45.0,
                'unit' => 5,
                'available' => 5,
                'sold' => 0,
                'created_at' => '2020-12-18 11:27:21',
                'updated_at' => '2020-12-18 11:27:21',
            ),
            9 =>
            array (
                'id' => 'eea82720-bb69-4379-a576-e59a9965961c',
                'name' => 'Aba Wear',
                'description' => 'This is a cool and nice stuff. You will enjoy it.',
                'user_id' => '025eeda9-55ff-11eb-b430-b46921043e18',
                'image_path' => '/img/product-1.jpg',
                'currency' => 'USD',
                'price' => 790.0,
                'unit' => 3,
                'available' => 3,
                'sold' => 0,
                'created_at' => '2020-12-21 11:27:21',
                'updated_at' => '2020-12-13 11:27:21',
            ),
        ));


    }
}
