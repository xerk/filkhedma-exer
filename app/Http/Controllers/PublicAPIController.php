<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PublicAPIController extends Controller
{

    private $uri;

    public function __construct() {
        $this->uri = 'https://arbeitnow.com/api/job-board-api';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Cache::remember('jobs_' . $request->page, 3600, function () use($request) {

            $response = Http::get($this->uri, [
                'page' => $request->page
            ]);

            return $response = $response->json();

        });
    }
}
