<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubscriberTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_subscriber_fields_are_validated()
    {
        $response = $this->post('/api/subscribers', [
            "email" => "veekthovens@veekthoven.com", //valid
            "name" => "Victor", //valid
            "fields" => [
                [
                    "key" => "phone_number",
                    "value" => "victor", //invalid because this field is expecting a "number" type.
                    "type" => "number"
                ]
            ]
        ], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(422);

        $response = $this->post('/api/subscribers', [
            "email" => "veekthovens@veekthoven.com", //valid
            "name" => "Victor", //valid
            "fields" => [
                [
                    "key" => "Company",
                    "value" => 1, //invalid because this field is expecting a "string" type.
                    "type" => "string"
                ]
            ]
        ], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(422);


        $response = $this->post('/api/subscribers', [
            "email" => "veekthovens@veekthoven.com", //valid
            "name" => "Victor", //valid
            "fields" => [
                [
                    "key" => "vaccinated",
                    "value" => "victor", //invalid because this field is expecting a "boolean" type.
                    "type" => "boolean"
                ]
            ]
        ], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(422);


        $response = $this->post('/api/subscribers', [
            "email" => "veekthovens@veekthoven.com", //valid
            "name" => "Victor", //valid
            "fields" => [
                [
                    "key" => "date_of_birth",
                    "value" => "victor", //invalid because this field is expecting a "date" type.
                    "type" => "date"
                ]
            ]
        ], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(422);
    }
}
