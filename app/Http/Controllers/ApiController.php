<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPublicHolidays(Request $request)
    {
        // Set the api url
        $url = config('app.holidays_url') . '?action=getHolidaysForYear&year=' . $request->year . '&country=ZAF';

        // Send the request
        $response = Http::get($url);

        // Return the json response
        return $response->json();
    }
}
