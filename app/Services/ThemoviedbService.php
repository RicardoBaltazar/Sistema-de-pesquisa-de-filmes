<?php

namespace App\Services;

use App\Api\ApiMessages;
use Illuminate\Support\Facades\Cache;

class ThemoviedbService
{
    private $movieName;

    // método que talvez melhore a organização e arquitetura do código
    // protected $client;

    // public function __construct()
    // {
    //     $this->client = new \GuzzleHttp\Client([
    //         'base_uri' => 'https://api.externa.com/',
    //     ]);
    // }

    public function getMoviesByName()
    {
        try {
            $moviesCache = Cache::remember($this->movieName, 60 * 60, function () {
                $client = new \GuzzleHttp\Client();
                $request = $client->get(
                    'https://api.themoviedb.org/3/search/movie?api_key=6e211184c3ed0bcafc484d29956307fb&language=en-US&query=' . $this->movieName . '&page=1&include_adult=false',
                    ['verify' => false]
                );
                $response = $request->getBody();

                $movies = json_decode($response->getContents());

                return $movies;
            });

            return $moviesCache;

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 404);
        }
    }

    /**
     * Set the value of movieName
     *
     * @return  self
     */
    public function setMovieName($movieName)
    {
        $this->movieName = $movieName;

        return $this;
    }
}
