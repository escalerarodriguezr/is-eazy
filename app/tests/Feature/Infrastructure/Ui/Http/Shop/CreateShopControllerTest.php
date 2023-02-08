<?php

namespace Tests\Feature\Infrastructure\Ui\Http\Shop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class CreateShopControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_shop_returns_a_successful_response()
    {

        $payload = [
            "name" => "Tienda Santander",
            "products" => [
                [
                    "name" => "Teclado"
                ],
                [
                    "name" => "Monitor"
                ]
            ]

        ];

        $response = $this->postJson('/v1/shop',$payload);

        $response->assertStatus(201)
            ->assertJsonPath('shop.name', 'Tienda Santander');
    }

    public function test_create_shop_empy_name_returns_a_ValidationExpcetion_response()
    {

        $payload = [
            "name" => "",
            "products" => [
                [
                    "name" => "Teclado"
                ],
                [
                    "name" => "Monitor"
                ]
            ]

        ];

        $response = $this->postJson('/v1/shop',$payload);

        $response->assertStatus(422)
            ->assertJsonPath('exception', 'ValidationException');
    }

    public function test_create_shop_empy_product_name_returns_a_ValidationExpcetion_response()
    {

        $payload = [
            "name" => "Tienda Santander",
            "products" => [
                [
                    "name" => ""
                ],
                [
                    "name" => "Monitor"
                ]
            ]

        ];

        $response = $this->postJson('/v1/shop',$payload);

        $response->assertStatus(422)
            ->assertJsonPath('exception', 'ValidationException');
    }

}
