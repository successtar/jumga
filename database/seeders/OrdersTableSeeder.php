<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('orders')->delete();

        DB::table('orders')->insert(array (
            0 =>
            array (
                'id' => 'a9a89331-f657-40a3-9648-517857ab3bb3',
                'first_name' => 'Salim',
                'last_name' => 'Kelly',
                'phone' => '123456789',
                'email' => 'dakeje5497@pashter.com',
                'currency' => 'USD',
                'amount' => 128.8,
                'jumga_fee' => 11.2,
                'dispatch' => 20.0,
                'total' => 160.0,
                'user_id' => '025eeda9-55ff-11eb-b430-b46921043e18',
                'transaction_id' => '042c037e-b8e5-4543-96d6-feaa93fcc5fc',
                'address' => '2, Hammed street',
                'city' => 'Lekki',
                'state' => 'Lagos',
                'country' => 'NG',
                'zip' => NULL,
                'status' => 'RECEIVED',
                'items' => '[{"id": "c4bc61bd-96fe-4bc8-b38a-a5b28473dbf1", "name": "Cool Cloth", "unit": "2", "image": "/img/product-5.jpg", "price": "10"}, {"id": "aba02254-0476-4805-87b5-9888f83a4b67", "name": "Flutter wear", "unit": "1", "image": "/img/product-6.jpg", "price": "60"}, {"id": "2528f0df-7a68-4aaa-bdda-19c4203a9170", "name": "Success Fabric", "unit": "1", "image": "/img/product-2.jpg", "price": "60"}]',
                'created_at' => '2021-01-19 08:58:32',
                'updated_at' => '2021-01-19 08:58:32',
            ),
        ));


    }
}
