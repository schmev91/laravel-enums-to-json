<?php
namespace SassLaravel\LaravelEnumsToJson\Commands;

use Illuminate\Console\Command;
use SassLaravel\LaravelEnumsToJson\Models\Post;

class SetupPackage extends Command
{
    protected $signature = "enums-to-json:setup";
    protected $description = "Setup the package by publishing and running migrations";

    public function handle()
    {
        // Publish the package's migrations
        $this->call("vendor:publish", [
            "--tag" => "enums-to-json-config",
        ]);
        $this->call("vendor:publish", [
            "--tag" => "enums-to-json-migrations",
        ]);

        // Run the migrations
        $this->call("migrate");

        try {
            Post::factory(10)->create();
        } catch (\Throwable $th) {
            //throw $th;
        }

        $this->info("Package setup completed successfully.");
    }
}
