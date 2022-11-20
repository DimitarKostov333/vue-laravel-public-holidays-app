<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    /**
     * Get a list of public holidays.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPublicHolidays(Request $request) : array
    {
        // Set the api url with the year & country input
        $url = env('HOLIDAY_API_URL') . $request->year
                            . '&country=' . $request->country;

        // Return the json response
        return Http::get($url)->json();
    }

    /**
     * Display a listing of countries.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCountries() : array
    {
        // Return the json response
        return Http::get(env('ALL_COUNTRIES_API'))->json();
    }
}
