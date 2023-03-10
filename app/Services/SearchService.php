<?php

namespace App\Services;

class SearchService
{
    private $themoviedbService;

    public function __construct(ThemoviedbService $themoviedbService)
    {
        $this->themoviedbService = $themoviedbService;
    }

    public function searchByMovieName(string $name)
    {
        $this->themoviedbService->setMovieName($name);

        $movies = $this->themoviedbService->searcMoviesByName();

        return response()->json(
            [
                // "title" => $movies['results']['original_title'],
                "data" => $movies]
        );
    }
}
