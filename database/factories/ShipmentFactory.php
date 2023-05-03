<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipment>
 */
class ShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tracking_number' => fake()->isbn13(),
            'sender_name' => fake()->name(),
            'user_id' => fake()->numberBetween($min = 5, $max = 10),
            'sender_address' => fake()->streetAddress(),
            'sender_city' => fake()->city(),
            'sender_state' => fake()->state(),
            'sender_zip' => fake()->postcode(),
            'recipient_name' => fake()->name(),
            'recipient_address' => fake()->streetAddress(),
            'recipient_city' => fake()->city(),
            'recipient_state' => fake()->state(),
            'recipient_zip' => fake()->postcode(),
            'length' => fake()->numberBetween($min = 2, $max = 8),
            'width' => fake()->numberBetween($min = 2, $max = 8),
            'height' => fake()->numberBetween($min = 2, $max = 8),
            'weight' => fake()->numberBetween($min = 2, $max = 8),
            'total_price' => fake()->numberBetween($min = 1000, $max = 9000),
            'status'=> fake()->randomElement($array = array ('pending','processing')),
        ];
    }
}
