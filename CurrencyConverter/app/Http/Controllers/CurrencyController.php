<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Post;

class CurrencyController extends Controller
{
    public function getRates(Request $request)
    {   
        
        //GET CURRENCY ON ALL COUNTRIES

        // $apiRequestAllCurrency = Http::withOptions(['verify' => false]) ->get("https://free.currconv.com/api/v7/currencies?apiKey=bb8577786cfa63478908");
        // $apiRequestAllCurrencyCountries = json_decode($apiRequestAllCurrency, true);
        // $apiRequest = $apiRequestAllCurrencyCountries['results'];

        
        //Set up country data for database migrations
        $countryList = ["HKD","EUR", "PHP", "JPY", "CHF", "BDT", "INR", "HUF", "SGD", "MXN", "KRW" ];
        
        //Loop through the array to individually register each countries information to the database 
        foreach($countryList as $key) {
            $dateToday = date('Y-m-d');
            $dateYesterday = date('Y-m-d',strtotime("-1 days"));
            $apiRequestToday = Http::withOptions(['verify' => false]) ->get("https://free.currconv.com/api/v7/convert?q=USD_{$key},{$key}_USD&compact=ultra&date={$dateToday}&apiKey=bb8577786cfa63478908")->json();
            $apiRequestYesterday = Http::withOptions(['verify' => false]) ->get("https://free.currconv.com/api/v7/convert?q=USD_{$key},{$key}_USD&compact=ultra&date={$dateYesterday}&apiKey=bb8577786cfa63478908")->json();
            $rateToday = $apiRequestToday["{$key}_USD"][$dateToday];
            $rateYesterday = $apiRequestYesterday["{$key}_USD"][$dateYesterday];
        
            $trial = Post::create([
            "country" => $key,
            "rate_today" => $rateToday,
            "rate_yesterday" => $rateYesterday
            ]);            

        }

        $countries = Post::all();
        
        return $countries;
    }


    //MAIN FUNCTION OF THE CURRENCY CONVERTER
    public function getCurrencyConvert(Request $request) {
        //Get all variables
        $value = $request ->value;
        $country = $request ->country;

        //Get all values needed from database
        $results = Post::where("country", $country)->get();
        $rate_today = $results[0]['rate_today'];
        $rate_yesterday = $results[0]['rate_yesterday'];

        //Computations
        $converted_value = $value * $rate_today;
        $rates_percentage_difference = (abs($rate_today-$rate_yesterday)/(($rate_today + $rate_yesterday)/2)) * 100;


        return [$converted_value,$value,$country,$rate_today, $rate_yesterday,$rates_percentage_difference];

    }

    //GET INFORMATION ON DATABASE
    public function getConversion() {
        $countries = Post::all();
        return $countries;

    }

    //DELETE ALL DATA ON DATABASE

    public function delete() {
        Post::truncate();

        $asd = Post::all();
        return $asd;

    }

}
