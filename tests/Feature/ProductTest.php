<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_fetch_products(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $products = Product::factory(10)->create();

        $response = $this->get(route('admin.products.index'));

        $response->assertStatus(200);
    }

    public function test_create_new_product(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Case 1: Missing required fields
        $response = $this->post(route('admin.products.store'), []);
        $response->assertSessionHasErrors(['name', 'price', 'quantity_available']);

        // Case 2: An invalid price
        $invalidPayload = [
            'name' => 'Test Product',
            'price' => 'price',
            'quantity_available' => 10
        ];
        $response = $this->post(route('admin.products.store'), $invalidPayload);
        $response->assertSessionHasErrors(['price']);

        $payload = [
            'name' => 'Sample Product',
            'price' => 100.50,
            'quantity_available' => 100
        ];

        $response = $this->post(route('admin.products.store'), $payload);
        $response->assertRedirect(route('admin.products.index'));
    }

    public function test_product_edit_validation(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create([
            'name' => 'Product Name',
            'price' => 100,
            'quantity_available' => 10
        ]);

        // Case 1: Missing required fields
        $response = $this->put(route('admin.products.update', $product->id), []);
        $response->assertSessionHasErrors(['name', 'price', 'quantity_available']);

        // Case 2: An invalid price
        $invalidData = [
            'name' => 'Updated Product Name',
            'price' => 'price',
            'quantity_available' => 15
        ];
        $response = $this->put(route('admin.products.update', $product->id), $invalidData);
        $response->assertSessionHasErrors(['price']);

        // Case 3: Valid data
        $validData = [
            'name' => 'Updated Product Name',
            'price' => 200.50,
            'quantity_available' => 20
        ];
        $response = $this->put(route('admin.products.update', $product->id), $validData);
        $response->assertRedirect(route('admin.products.index'));
    }

    public function test_create_product_unauthorized(): void
    {
        // Case 1: Normal User
        $user = User::factory()->create([
            'role_id' => UserRole::USER,
        ]);
        $this->actingAs($user);

        $payload = [
            'name' => 'Test Product 3',
            'price' => 100.50,
            'quantity_available' => 100,
        ];

        // Try to create a product as an unauthorized user
        $response = $this->post(route('admin.products.store'), $payload);
        $response->assertForbidden();
    }
}
