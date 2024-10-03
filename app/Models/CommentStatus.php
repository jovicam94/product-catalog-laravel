<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentStatus extends Model
{
    use HasFactory;

    const STATUS_WAITING_FOR_APPROVAL = 1;
    const STATUS_APPROVED = 2;
    const STATUS_DENIED = 3;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
