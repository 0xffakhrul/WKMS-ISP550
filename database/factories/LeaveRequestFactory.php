<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LeaveRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Fetch a random employee to associate with the leave request
        $employee = Employee::inRandomOrder()->first();

        return [
            'employee_id' => $employee->id,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'request_date' => $this->faker->date,
            'leave_type' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
