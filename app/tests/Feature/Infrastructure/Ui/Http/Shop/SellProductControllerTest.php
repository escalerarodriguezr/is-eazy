<?php

namespace Tests\Feature\Infrastructure\Ui\Http\Shop;
use Database\Seeders\ShopSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class SellProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_sell_product_returns_a_successful_response()
    {
        $this->seed([
            ShopSeeder::class
        ]);

        $url = sprintf(
            '/v1/sell-product-of-shop/%s/product/%s',
            ShopSeeder::SHOP_MADRID_ID,
            ShopSeeder::SHOP_MADRID_PRODUCT_1_ID
        );
        $response = $this->putJson($url);

        $response->assertStatus(200)
            ->assertJsonPath('operationResult', 'ALERT!! Product sold, 0 units of the product remain in stock');
    }

    public function test_sell_product_returns_a_ProductEmptyStockException_response()
    {
        $this->seed([
            ShopSeeder::class
        ]);

        $url = sprintf(
            '/v1/sell-product-of-shop/%s/product/%s',
            ShopSeeder::SHOP_MADRID_ID,
            ShopSeeder::SHOP_MADRID_PRODUCT_1_ID
        );
        $response = $this->putJson($url);

        $response->assertStatus(200)
            ->assertJsonPath('operationResult', 'ALERT!! Product sold, 0 units of the product remain in stock');

        $response = $this->putJson($url);

        $response->assertStatus(409)
            ->assertJsonPath('exception', 'ProductEmptyStockException');
    }

}
