<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\CommentStatus;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $validatedData = $request->validated();

        $product = Product::with(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($request->product_id);

        $product->comments()
            ->create($validatedData);

        return redirect()
            ->route('products.show', $product->id)
            ->with('success', 'Comment added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approveComment($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->comment_status_id = CommentStatus::STATUS_APPROVED;
        $comment->save();

        return redirect()
            ->back()
            ->with(
                'success',
                'Comment approved successfully!'
            );
    }

    public function denyComment($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->comment_status_id = CommentStatus::STATUS_DENIED;
        $comment->save();

        return redirect()
            ->back()
            ->with(
                'success',
                'Comment denied successfully!'
            );
    }
}
