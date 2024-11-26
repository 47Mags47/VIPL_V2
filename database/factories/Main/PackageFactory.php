<?php

namespace Database\Factories\Main;

use App\Models\Main\CalendarEvent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'status_code' => 'created',
            'comment' => null,
            'event_id' => CalendarEvent::all()->random(1)->first()->code,
        ];
    }
}
