<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('transactions')->delete();

        DB::table('transactions')->insert(array (
            0 =>
            array (
                'id' => '042c037e-b8e5-4543-96d6-feaa93fcc5fc',
                'email' => 'dakeje5497@pashter.com',
                'currency' => 'USD',
                'amount' => 160.0,
                'gateway_ref' => '0ddd0588-f387-4ff6-97cd-b98d006440fc',
                'user_id' => '025eeda9-55ff-11eb-b430-b46921043e18',
                'category' => 'INCOMING',
                'status' => 'COMPLETED',
                'type' => 'ORDER',
                'description' => NULL,
                'meta' => '{"zip": null, "city": "Lekki", "email": "dakeje5497@pashter.com", "items": [{"id": "c4bc61bd-96fe-4bc8-b38a-a5b28473dbf1", "name": "Cool Cloth", "unit": "2", "image": "/img/product-5.jpg", "price": "10"}, {"id": "aba02254-0476-4805-87b5-9888f83a4b67", "name": "Flutter wear", "unit": "1", "image": "/img/product-6.jpg", "price": "60"}, {"id": "2528f0df-7a68-4aaa-bdda-19c4203a9170", "name": "Success Fabric", "unit": "1", "image": "/img/product-2.jpg", "price": "60"}], "phone": "123456789", "state": "Lagos", "_token": "8QNvUYnkmr2HdHFT1hqHACr31uHMX9nXJhaLAGSl", "address": "2, Hammed street", "country": "NG", "last_name": "Kelly", "first_name": "Salim"}',
                'log' => '{"data": {"id": 1849067, "ip": "102.89.3.154", "card": {"type": "VISA", "token": "flw-t1nf-2d5ba8defa41dcb2c1d1dad16af75180-m03k", "expiry": "09/35", "issuer": "ACCESS BANK PLC CREDIT PREMIER", "country": "NIGERIA NG", "last_4digits": "9647", "first_6digits": "475176"}, "meta": null, "amount": 160, "status": "successful", "tx_ref": "0ddd0588-f387-4ff6-97cd-b98d006440fc", "app_fee": 6.08, "flw_ref": "FLW-MOCK-806d9ab7ab054df9cbee80b64aaca0f2", "currency": "USD", "customer": {"id": 569230, "name": "Salim Kelly", "email": "dakeje5497@pashter.com", "created_at": "2021-01-19T08:58:22.000Z", "phone_number": "123456789"}, "narration": "CARD Transaction ", "account_id": 79511, "auth_model": "VBVSECURECODE", "created_at": "2021-01-19T08:58:23.000Z", "merchant_fee": 0, "payment_type": "card", "amount_settled": 160, "charged_amount": 166.08, "device_fingerprint": "228fb4cfb47a05ff7c72b583fdb1c90b", "processor_response": "Approved. Successful"}, "status": "success", "message": "Transaction fetched successfully"}',
                'created_at' => '2021-01-19 08:58:05',
                'updated_at' => '2021-01-19 08:58:30',
            ),
        ));


    }
}
