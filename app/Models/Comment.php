<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'comments';
    protected $guarded = [];
    protected $fillable = ['users_id', 'post_id', 'comment'];

    public function posts() 
    {
        return $this->belongsTo(Comment::class);
    }

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
}
