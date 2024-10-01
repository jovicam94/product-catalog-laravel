<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        Comment::factory()
            ->count(30)
            ->make()
            ->each(function ($comment) use ($products) {
                $comment->product_id = $products->random()->id;
                $comment->save();
            });
    }
}
