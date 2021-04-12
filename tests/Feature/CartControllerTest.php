<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartControllerTest extends TestCase
{
   public function test_product_can_be_added_to_cart()
   {
        $this->get(route('cart.store'))->assertStatus(200);
   }
}
