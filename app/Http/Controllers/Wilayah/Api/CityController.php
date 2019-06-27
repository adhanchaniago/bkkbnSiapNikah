<?php

namespace App\Http\Controllers\Wilayah\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravolt\Indonesia\Indonesia;

class CityController extends Controller
{
    public function GetCities(){
        $cities = Indonesia::allCities();
        return response()->json([
            "message"=>"Berhasil mendapatkan data wilayah",
            "status"=> 200,
            "data"=> $cities
        ]);
    }
}
