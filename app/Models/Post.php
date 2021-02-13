<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'slug', 'body'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->BelongsToMany(Tag::class);
    }
}
