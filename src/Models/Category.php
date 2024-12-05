<?php
namespace SassLaravel\LaravelEnumsToJson\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "package_post_categories";

    protected $fillable = ["name"];
}
