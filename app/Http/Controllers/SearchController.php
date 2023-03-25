<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Services\SearchService;

class SearchController extends Controller
{
    private $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function show(MovieRequest $request)
    {
        $data = $request->all();
        return $this->searchService->searchByMovieName($data['name']);
    }
}
