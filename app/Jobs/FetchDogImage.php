<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Services\DogApiService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class FetchDogImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $breed;

    /**
     * Create a new job instance.
     */
    public function __construct($breed)
    {
        $this->breed = $breed;
    }

    /**
     * Execute the job.
     */
    public function handle(DogApiService $dogApiService): void
    {
        $randomImage = $dogApiService->getRandomImageForBreed($this->breed);
    }
}
