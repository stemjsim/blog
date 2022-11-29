<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;  //used to get metadata 

class Post 
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title,$excerpt,$date,$body,$slug){
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function(){ //cache all posts forever to prevent constant reloading
            return collect(File::files(resource_path("posts/"))) // Laravel Collection
                    ->map(function($file){ //mapping each item into documents
                    return YamlFrontMatter::parseFile($file);
                    }) 
                ->map(function($document){ //mapping each document into a new post

                    return new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    );
                })->sortByDesc('date'); //sort the blog post dedcending the date.
        });
    
}

    public static function find($slug)
    {
      return static::all()->firstWhere('slug', $slug);

    }


    public static function findOrFail($slug)
    {
      $post = static::find($slug);

      if (! $post) {
        throw new ModelNotFoundException();
      }
      return $post;
    }

    // public static function find($slug){
    //     base_path(); //gets base path of file
    //     $path = resource_path("posts/{$slug}.html");

    // //check if path exists and dump error or redirect to another page
    // if(!file_exists($path)){
    //     // dd('file does not exist'); // dd = die and dump - stops processing outputs string
    //     // ddd('file does not exist'); // dd = die and dump, debug - stops processing outputs error message
    //     // abort(404); // outputs 404 message
    //     //return redirect('/'); //redirects to filepath, in this case home page as above
    //     throw new ModelNotFoundException(); //laravel exception function
    // }
    // // cache page for 60 mins  
    // // $post = cache()->remember("posts.{$slug}" , 3600, function () use ($path) {
    // //     return file_get_contents($path);
    // // });
    // return cache()->remember("posts.{$slug}" , 3600, fn() => file_get_contents($path)); //php arrow func

    // }
}