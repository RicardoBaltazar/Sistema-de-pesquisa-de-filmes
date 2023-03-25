<?php

namespace App\Services;

use App\Api\ApiMessages;
use App\Jobs\UpdateMoviesCacheJob;
use App\Services\Api\ApiConnectorService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ThemoviedbService
{
    private $movieName;
    private $apiConnector;

    public function __construct(ApiConnectorService $apiConnector)
    {
        $this->apiConnector = $apiConnector;
    }

    public function getMoviesByName()
    {
        try {
            // $moviesCache = Cache::remember($this->movieName, 60 * 5, function () {
            $moviesCache = Cache::remember($this->movieName, 5, function () {
                $url = 'https://api.themoviedb.org/3/search/movie?api_key=6e211184c3ed0bcafc484d29956307fb&language=en-US&query=' . $this->movieName . '&page=1&include_adult=false';

                $response_json = $this->apiConnector->call($url);

                Log::info('Registrando pesquisa em cache');
                // dispatch(new UpdateMoviesCacheJob($this->movieName, $response_json))->delay(now()->addSecond(60 * 5));
                dispatch(new UpdateMoviesCacheJob($this->movieName, $response_json))->delay(now()->addSecond(5));
                // dispatch(new UpdateMoviesCacheJob($this->movieName, $response_json))->hourly(2); ->exemplo para duas horas
                return $response_json;
            });

            return $moviesCache;

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            Log::info('testando logs');
            Log::error($message->getMessage());
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
