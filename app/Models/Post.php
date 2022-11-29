<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // everything fillable except
    // protected $guarded = ['id'];
    protected $guarded = [];
    //define what is fillable anything left out is not fillable
    // protected $fillable = ['title','excerpt', 'body'];


    protected $with = ['category', 'author']; //eager loading for evey post query - reduces sql queries 

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
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id');
    }
}
