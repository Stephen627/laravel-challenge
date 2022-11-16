<?php

namespace App\Console\Commands;

use App\Models\Breed;
use App\Services\Dog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ImportBreeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'breeds:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import breeds from the dog.ceo API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $service = new Dog();
        $breeds = $service->getAllBreeds();
        if (!$breeds) {
            return Command::FAILURE;
        }

        foreach ($breeds as $breed) {
            Breed::updateOrCreate([
                'name' => $breed,
            ]);
        }

        Breed::whereNotIn('name', $breeds)
            ->delete();

        Cache::store('redis')->put('breeds', $breeds);

        return Command::SUCCESS;
    }
}
