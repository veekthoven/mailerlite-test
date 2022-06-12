<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FieldTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_type_we_dont_support_cant_be_used()
    {
        $response = $this->post('/api/fields', [
            "title" => "Company",
            "type" => "image",
        ], [
            'accept' => 'application/json'
        ]);


        $response->assertStatus(422);


        $response = $this->post('/api/fields', [
            "title" => "Company",
            "type" => "string",
        ], [
            'accept' => 'application/json'
        ]);


        $response->assertStatus(201);
    }
}
