<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'author',
        'email',
        'comment'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function comment_status()
    {
        return $this->belongsTo(CommentStatus::class);
    }

    public function scopeWaitingForApproval(Builder $query)
    {
        return $query->where(
            'comment_status_id',
            '=',
            CommentStatus::STATUS_WAITING_FOR_APPROVAL
        );
    }

    public function scopeApproved(Builder $query)
    {
        return $query->where(
            'comment_status_id',
            CommentStatus::STATUS_APPROVED
        );
    }

}
