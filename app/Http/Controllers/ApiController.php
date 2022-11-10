<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPublicHolidays(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://kayaposoft.com/enrico/json/v2.0/?action=getHolidaysForYear&year=' . $request . '&country=ZAF');

        if($response->getStatusCode() == 200){
            return response()->json([
                'success' => true,
                'message' => 'List data post',
                'data' => $posts
            ], 200);
        }

    }
}
