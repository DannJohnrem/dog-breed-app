<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\DogApiService;
use Illuminate\Support\Facades\Auth;

class DogController extends Controller
{
    public function showBreeds(DogApiService $dogApiService)
    {
        $breeds = $dogApiService->getAllBreeds();
        $dogs = collect($breeds['message'])->map(function ($subBreeds, $breed) use ($dogApiService) {
            $randomImage = $dogApiService->getRandomImageForBreed($breed);
            return [
                'id' => $breed,
                'breed' => $breed,
                'image' => $randomImage['message'],
            ];
        });

        return Inertia::render('Breeds', [
            'dogs' => $dogs
        ]);
    }

    public function likeDog(Request $request)
    {
        $request->validate(['dog_id' => 'required|string']);

        $user = Auth::user();

        // Check if the user already liked 3 dogs
        if ($user->likedDogs()->count() >= 3) {
            return response()->json(['message' => 'You can only like up to 3 dogs.'], 400);
        }

        // You can attach the dog by the breed name instead of an ID
        $user->likedDogs()->attach(['breed' => $request->dog_id]);

        return response()->json(['message' => 'Dog liked successfully.']);
    }

    public function likedDogs()
    {
        $likedDogs = Auth::user()->likedDogs()->with('likedByUsers')->get();

        // Ensure it's passed correctly to the Inertia view
        return Inertia::render('LikedDogs', ['likedDogs' => $likedDogs]);
    }

    public function otherUsersLikedDogs()
    {
        $users = User::with('likedDogs')->where('id', '!=', Auth::id())->get();

        return Inertia::render('Users/OtherUsers', ['users' => $users]);
    }
}
