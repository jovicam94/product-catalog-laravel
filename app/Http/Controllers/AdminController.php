<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $comments_for_approval = Comment::waitingForApproval()
            ->paginate(10);

        return view('admin.dashboard', [
            'comments_for_approval' => $comments_for_approval
        ]);
    }
}
