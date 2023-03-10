<?php

namespace App\Services;

use App\Api\ApiMessages;

class ThemoviedbService
{
    private $movieName;

    public function searcMoviesByName()
    {

        try {
            $client = new \GuzzleHttp\Client();
            $request = $client->get(
                'https://api.themoviedb.org/3/search/movie?api_key=6e211184c3ed0bcafc484d29956307fb&language=en-US&query=' . $this->movieName . '&page=1&include_adult=false',
                ['verify' => false]
            );
            $response = $request->getBody();

            return json_decode($response->getContents());

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
