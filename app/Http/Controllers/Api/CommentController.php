<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Resources\Comment\CommentWithProductResource;
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
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $validatedData = $request->validated();

        $product = Product::with(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($request->id);

        $comment = $product->comments()
            ->create($validatedData);

        return new CommentResource($comment);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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

    function approveComment(Request $request)
    {
        $comment = Comment::findOrFail($request->id);

        if ($comment->comment_status_id !== CommentStatus::STATUS_WAITING_FOR_APPROVAL)
        {
            return response()->json([
                'message' => "You cannot change status of this comment.",
            ], 409);
        }

        $comment->comment_status_id = CommentStatus::STATUS_APPROVED;
        $comment->save();

        return new CommentWithProductResource($comment);
    }

    function denyComment(Request $request)
    {
        $comment = Comment::findOrFail($request->id);

        if ($comment->comment_status_id !== CommentStatus::STATUS_WAITING_FOR_APPROVAL)
        {
            return response()->json([
                'message' => "You cannot change status of this comment.",
            ], 409);
        }

        $comment->comment_status_id = CommentStatus::STATUS_DENIED;
        $comment->save();

        return new CommentResource($comment);
    }
}
