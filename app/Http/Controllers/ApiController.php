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
        // Set the api url with the year input
        $url = env('HOLIDAY_API_URL') . $request->year . '&country=ZAF';

        // Return the json response
        return Http::get($url)->json();
    }
}
