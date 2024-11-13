<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DogApiService {

    public function getAllBreeds()
    {
        return cache()->remember('dog_breeds', 3600, function () {
            return Http::get('https://dog.ceo/api/breeds/list/all')->json();
        });
    }

    public function getRandomImageForBreed($breed)
    {
        return cache()->remember("dog_image_{$breed}", 3600, function () use ($breed) {
            return Http::get("https://dog.ceo/api/breed/{$breed}/images/random")->json();
        });
    }
}
