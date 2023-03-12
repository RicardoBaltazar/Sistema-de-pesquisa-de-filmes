<?php

namespace App\Services;

class SearchService
{
    private $themoviedbService;
    private array $formattedMovies = [];


    public function __construct(ThemoviedbService $themoviedbService)
    {
        $this->themoviedbService = $themoviedbService;
    }

    public function searchByMovieName(string $name)
    {
        $this->themoviedbService->setMovieName($name);
        $movies = $this->themoviedbService->searcMoviesByName();

        foreach ($movies->results as $movie) {
            $this->formattedMovies[] = [
                "title" => $movie->original_title,
                "poster" => $movie->poster_path,
                "overview" => $movie->overview,
                "vote_average" => $movie->vote_average,
                "release_date" => $movie->release_date,
            ];
        }

        return response()->json($this->formattedMovies);
    }
}
