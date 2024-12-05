<?php
namespace SassLaravel\LaravelEnumsToJson\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "package_post_comments";

    protected $fillable = ["post_id", "user_id", "comment"];
}
