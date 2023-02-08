<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Preventool\Domain\Demo\Model\Demo;

class ShopSeeder extends Seeder
{
    const SHOP_MADRID_ID = 100;
    const SHOP_MADRID_NAME = 'Madrid';

   const SHOP_MADRID_CREATED_AT = '2023-02-08 19:24:26';
   const SHOP_MADRID_PRODUCTS_COUNT = 3;


    const SHOP_MADRID_PRODUCT_1_ID = 201;
    const SHOP_MADRID_PRODUCT_1_NAME = 'Libro';

    const SHOP_MADRID_PRODUCT_2_ID = 202;
    const SHOP_MADRID_PRODUCT_2_NAME = 'Juego Lego';

    const SHOP_MADRID_PRODUCT_3_ID = 203;
    const SHOP_MADRID_PRODUCT_3_NAME = 'Teclado';



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            'id' => self::SHOP_MADRID_ID,
            'name' => self::SHOP_MADRID_NAME,
            'created_at' =>  self::SHOP_MADRID_CREATED_AT
        ]);

        DB::table('products')->insert([
            'id' => self::SHOP_MADRID_PRODUCT_1_ID,
            'name' => self::SHOP_MADRID_PRODUCT_1_NAME,
            'created_at' =>  self::SHOP_MADRID_CREATED_AT
        ]);

        DB::table('products')->insert([
            'id' => self::SHOP_MADRID_PRODUCT_2_ID,
            'name' => self::SHOP_MADRID_PRODUCT_2_NAME,
        ]);

        DB::table('products')->insert([
            'id' => self::SHOP_MADRID_PRODUCT_3_ID,
            'name' => self::SHOP_MADRID_PRODUCT_3_NAME,
            'created_at' =>  self::SHOP_MADRID_CREATED_AT
        ]);

        DB::table('product_shop')->insert([
            'shop_id' => self::SHOP_MADRID_ID,
            'product_id' => self::SHOP_MADRID_PRODUCT_1_ID,

        ]);

        DB::table('product_shop')->insert([
            'shop_id' => self::SHOP_MADRID_ID,
            'product_id' => self::SHOP_MADRID_PRODUCT_2_ID,
        ]);

        DB::table('product_shop')->insert([
            'shop_id' => self::SHOP_MADRID_ID,
            'product_id' => self::SHOP_MADRID_PRODUCT_3_ID,
        ]);

    }
}
