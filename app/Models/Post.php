<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes; 

    protected $table = 'posts';
    protected $guarded = [];
    protected $fillable = ['title', 'text', 'user_id', 'category_id'];

    public function users() 
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    
    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    public function category() 
    {
        return $this->hasMany(Category::class);
    }
}
