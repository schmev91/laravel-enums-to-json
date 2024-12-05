<?php

use Illuminate\Console\Command;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

return new class extends Migration {
    public function up()
    {
        $userTable = Config::get("package.user_table", "users");

        // Table for posts
        if (!Schema::hasTable("package_posts")) {
            Schema::create("package_posts", function (Blueprint $table) use (
                $userTable
            ) {
                $table->id();
                $table->string("title");
                $table->text("content");
                $table->unsignedBigInteger("user_id");
                $table
                    ->foreign("user_id")
                    ->references("id")
                    ->on($userTable)
                    ->onDelete("cascade");
                $table->timestamps();
            });
        }

        // Table for post categories
        if (!Schema::hasTable("package_post_categories")) {
            Schema::create("package_post_categories", function (
                Blueprint $table
            ) {
                $table->id();
                $table->string("name");
                $table->timestamps();
            });
        }

        // Table for post comments
        if (!Schema::hasTable("package_post_comments")) {
            Schema::create("package_post_comments", function (
                Blueprint $table
            ) use ($userTable) {
                $table->id();
                $table->unsignedBigInteger("post_id");
                $table
                    ->foreign("post_id")
                    ->references("id")
                    ->on("package_posts")
                    ->onDelete("cascade");
                $table->unsignedBigInteger("user_id");
                $table
                    ->foreign("user_id")
                    ->references("id")
                    ->on($userTable)
                    ->onDelete("cascade");
                $table->text("comment");
                $table->timestamps();
            });
        }

        // Table for post tags
        if (!Schema::hasTable("package_post_tags")) {
            Schema::create("package_post_tags", function (Blueprint $table) {
                $table->id();
                $table->string("name");
                $table->timestamps();
            });
        }

        // Pivot table for post_tag relationships
        if (!Schema::hasTable("package_post_tag")) {
            Schema::create("package_post_tag", function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger("post_id");
                $table
                    ->foreign("post_id")
                    ->references("id")
                    ->on("package_posts")
                    ->onDelete("cascade");
                $table->unsignedBigInteger("tag_id");
                $table
                    ->foreign("tag_id")
                    ->references("id")
                    ->on("package_post_tags")
                    ->onDelete("cascade");
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists("package_posts");
        Schema::dropIfExists("package_post_categories");
        Schema::dropIfExists("package_post_comments");
        Schema::dropIfExists("package_post_tags");
        Schema::dropIfExists("package_post_tag");
    }
};
