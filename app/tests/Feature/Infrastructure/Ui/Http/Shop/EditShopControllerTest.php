<?php

namespace Tests\Feature\Infrastructure\Ui\Http\Shop;
use Database\Seeders\ShopSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class EditShopControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_edit_shop_returns_a_successful_response()
    {
        $this->seed([
            ShopSeeder::class
        ]);

        $payload = [
            "name" => "Tienda Santander",
        ];

        $response = $this->putJson('/v1/shop/'.ShopSeeder::SHOP_MADRID_ID,$payload);

        $response->assertStatus(200)
            ->assertJsonPath('shop.name', 'Tienda Santander');
    }

}
