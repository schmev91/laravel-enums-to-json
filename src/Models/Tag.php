<?php
namespace SassLaravel\LaravelEnumsToJson\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "package_post_tags";

    protected $fillable = ["name"];
}
