<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommentStatus>
 */
class CommentStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }

    public function waitingForApproval()
    {
        return $this->state([
            'status' => 'Waiting for approval',
        ]);
    }

    public function approved()
    {
        return $this->state([
            'status' => 'Approved',
        ]);
    }

    public function denied()
    {
        return $this->state([
            'status' => 'Denied',
        ]);
    }
}
