<?php

namespace Tests\Feature\Infrastructure\Ui\Http\Shop;
use Database\Seeders\ShopSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;


class ListShopsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_shops_returns_a_successful_response()
    {
        $this->seed([
            ShopSeeder::class
        ]);

        $response = $this->get('/v1/shop');
        $response->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json->has(1)
                    ->first(fn ($json) =>
                    $json->where('id', ShopSeeder::SHOP_MADRID_ID)
                        ->where('name', ShopSeeder::SHOP_MADRID_NAME)
                        ->where('products_count',ShopSeeder::SHOP_MADRID_PRODUCTS_COUNT)
                        ->etc()
                    )
                );

    }

}
