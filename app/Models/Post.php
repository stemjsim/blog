<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use sluggable;

    protected $guarded = [];

    protected $with = ['category', 'author']; //eager loading for evey post query - reduces sql queries 

    // Add automatic slug generation to forms using Eloquent Sluggable Extension
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search)=> 
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%')
            )
        );
        
        $query->when($filters['category'] ?? false, fn($query, $category)=> 
            $query->whereHas('category', fn ($query) => 
                $query->where('slug', $category))
        );

        $query->when($filters['author'] ?? false, fn($query, $author)=> 
            $query->whereHas('author', fn ($query) => 
                $query->where('username', $author))
        );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function category()
    {
        //post can only have one category.
        //*** To Do - add multiple categories ***
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        //post can have only one author
        return $this->belongsTo(User::class, 'user_id');
    }
}
