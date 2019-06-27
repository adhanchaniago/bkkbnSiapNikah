<?php

namespace App\Http\Controllers\Wilayah\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravolt\Indonesia\Indonesia;
use App\City;

class CityController extends Controller
{
    public function GetCities(){
        $cities = City::all();
        return response()->json([
            "message"=>"Berhasil mendapatkan data wilayah",
            "status"=> 200,
            "data"=> $cities
        ]);
    }
}
