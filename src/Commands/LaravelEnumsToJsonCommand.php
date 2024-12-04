<?php

namespace SassLaravel\LaravelEnumsToJson\Commands;

use BackedEnum;
use Illuminate\Console\Command;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use SassLaravel\LaravelEnumsToJson\Attributes\EnumToJson;
use SassLaravel\LaravelEnumsToJson\Exceptions\LaravelEnumToJsonException;
use Spatie\StructureDiscoverer\Discover;

class LaravelEnumsToJsonCommand extends Command
{
    public $signature = 'enum-to-json:generate';

    public $description = 'It creates a json file off of an enum from attribute enum';

    public function handle(): int
    {
        $output = [];
        
        $enums = $this->getQualifiedEnums()->each(function(BackedEnum|string $enum) use (&$output) {
            $fileName = $this->generateFileName($enum);

            if($output[$fileName] ?? false){
                throw LaravelEnumToJsonException::nameCollison($fileName);
            }

            $output[$fileName] = $this->prepareEnumData($enum);

        });

        foreach ($output as $fileName => $contents) {
            Storage::disk(config('enums-to-json.disk'))
            ->put(str(config('enums-to-json.path') . '/' . $fileName)
            ->replace('//','/')
            ->toString(), 
        json_encode($contents));
        }

        
        
        $this->info("Generated: ", count($output) . " files.");

        return self::SUCCESS;
    }

    protected function generateFileName(BackedEnum|string $enum)
    {
        // if(method_exists($enum, 'jsonFileName')){
        //     return str($enum::jsonFileName())->finish('.json')->toString();
        // }
        
        return str($enum)->classBasename()->snake()->append('.json')->toString();
    }

    protected function prepareEnumData(BackedEnum|string $enum) :Collection{
        return collect($enum::cases())
        ->map(fn($el)=>[
            'label'=>$el->name,
            'value'=>$el->value
      ]);
    }

    protected function getQualifiedEnums() : Collection {
        $enums = Discover::in(...config('enums-to-json.enum_locations'))
        ->enums()
        ->withAttribute(EnumToJson::class)
        ->get();

        return collect($enums);
    }
}
