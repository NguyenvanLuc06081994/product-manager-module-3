<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new \App\Customer();
        $customer->name = "Tran Thanh Tung";
        $customer->phone = 113;
        $customer->email = "thanhtungmarine@gmail.com";
        $customer->address = "Bai Chay, Quang Ninh";
        $customer->save();
        $customer = new \App\Customer();
        $customer->name = "Bui Xuan Duong";
        $customer->phone = 114;
        $customer->email = "duong09@gmail.com";
        $customer->address = "Luc Ngan, Bac Giang";
        $customer->save();
        $customer = new \App\Customer();
        $customer->name = "Duong Manh Cuong";
        $customer->phone = 115;
        $customer->email = "cuongseven@gmail.com";
        $customer->address = "Dong Anh, Ha Noi";
        $customer->save();
    }
}
