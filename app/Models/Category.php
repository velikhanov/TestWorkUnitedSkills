<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;

class Category extends Model
{
    use HasFactory;

    public function postcats(){
      return $this->hasMany(Post::class);
    }

    // public function getCategoryCodeAttribute(){
    //   return $this->code
    // }
}
