<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
