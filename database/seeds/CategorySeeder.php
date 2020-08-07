<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Category();
        $category->name = 'Iphone';
        $category->vendor = 'Apple';
        $category->save();
        $category = new \App\Category();
        $category->name = 'SamSung';
        $category->vendor = 'SamSung';
        $category->save();
        $category = new \App\Category();
        $category->name = 'Oppo';
        $category->vendor = 'Oppo';
        $category->save();
    }
}
