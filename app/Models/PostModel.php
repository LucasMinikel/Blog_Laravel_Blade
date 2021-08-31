<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class PostModel extends Model
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $id;


    public function __construct($title, $excerpt, $date, $body, $id)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->id = $id;
    }


    public static function allPosts()
    {
        return cache()->rememberForever('PostModel.allPosts', function () {
            return collect(File::files(resource_path("posts/")))
            ->map(fn($file)=> YamlFrontMatter::parseFile($file))
            ->map(fn($document)=>new PostModel(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->id
                ))
            ->sortByDesc('date');
        });
    }
    public static function findPost($id)
    {
        return static::allPosts()->firstWhere('id', $id);
    }
}