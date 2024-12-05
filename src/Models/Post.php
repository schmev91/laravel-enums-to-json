<?php
namespace SassLaravel\LaravelEnumsToJson\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SassLaravel\LaravelEnumsToJson\Database\Factories\PostFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = "package_posts";

    protected $fillable = ["title", "content", "user_id"];

    protected static function newFactory()
    {
        return PostFactory::new();
    }
}
