<?php

namespace Database\Seeders;

use App\Models\CommentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CommentStatus::factory()->waitingForApproval()->create(['id' => 1]);
        CommentStatus::factory()->approved()->create(['id' => 2]);
        CommentStatus::factory()->denied()->create(['id' => 3]);
    }
}
