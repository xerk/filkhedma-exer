<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PublicAPIController extends Controller
{

    private $uri;

    public function __construct() {
        $this->uri = 'https://arbeitnow.com/api/job-board-api?page=2';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get($this->uri);

        $response = $response->json();
        
        // dd($response); 
        
        // You should put your data in the loop.
        $data = collect($response['data']); // So we create an collection to use helper methods

        $data->map(function ($item) {
            DB::table('jobs')->insertOrIgnore(['slug' => $item['slug']],[
                'company_name' => $item['company_name'],
                'title' => $item['title'],
                'description' => $item['description'],
                'remote' => $item['remote'],
                'url' => $item['url'],
                'tags' => json_encode($item['tags']),
                'job_types' => json_encode($item['job_types']),
                'location' => $item['location'],
                'created_at' => Carbon::parse(1647037209)->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::parse(1647037209)->format('Y-m-d H:i:s')
            ]);
        });
    }
}
