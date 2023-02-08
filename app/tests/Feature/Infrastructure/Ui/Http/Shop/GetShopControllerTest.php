<?php

namespace Tests\Feature\Infrastructure\Ui\Http\Shop;

use Database\Seeders\ShopSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;


class GetShopControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_shop_returns_a_successful_response()
    {
        $this->seed([
            ShopSeeder::class
        ]);

        $response = $this->get('/v1/shop/'.ShopSeeder::SHOP_MADRID_ID);
        $response->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('id')
                    ->has('name')
                    ->has('created_at')
                    ->has('updated_at')
                    ->has('products', 3)
                    ->has('products.0', fn ($json) =>
                        $json->where('id', ShopSeeder::SHOP_MADRID_PRODUCT_1_ID)
                            ->where('name', ShopSeeder::SHOP_MADRID_PRODUCT_1_NAME)
                            ->etc()
                    )
                    ->has('products.1', fn ($json) =>
                        $json->where('id', ShopSeeder::SHOP_MADRID_PRODUCT_2_ID)
                            ->where('name', ShopSeeder::SHOP_MADRID_PRODUCT_2_NAME)
                            ->etc()
                        )
                    ->has('products.2', fn ($json) =>
                        $json->where('id', ShopSeeder::SHOP_MADRID_PRODUCT_3_ID)
                            ->where('name', ShopSeeder::SHOP_MADRID_PRODUCT_3_NAME)
                            ->etc()
                        )
                );

    }

}
