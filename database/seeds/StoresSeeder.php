<?php

use Illuminate\Database\Seeder;

class StoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $store = new \App\Store();
        $store->name = "The Gioi Di Dong";
        $store->save();
        $store = new \App\Store();
        $store->name = "FPT Shop";
        $store->save();
        $store = new \App\Store();
        $store->name = "Viettel Store";
        $store->save();
    }
}
