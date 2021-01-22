<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Category;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'img',
        'title',
        'content',
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function category(){
      return $this->belongsTo(Category::class);
    }

    public function comments(){
      return $this->hasMany(Comment::class)->where('parent_id', '0');
    }

    public function getPartofCharAttribute(){
      return substr($this->content, 0, 30);
    }
    public function getPartofCharTitleAttribute(){
      return substr($this->content, 0, 15);
    }
}
