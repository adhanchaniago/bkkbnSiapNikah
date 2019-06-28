<?php

namespace App\Http\Controllers\Wilayah\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;

class ProvinceController extends Controller
{
    public function GetProvinces(){
        try {
            $provinces = Province::all();
            return response()->json([
                "message"=> "Sukses mendapatkan data provinsi",
                "provinces"=>$provinces
            ],200);
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th);
            return response()->json([
                "message"=> "Gagal mendapatkan data provinsi",
                "error"=>$th->getMessage()
            ],400);
        }
    }
    public function GetCitiesByProvinceId($id){
        try {
            $data = Province::find($id)->cities()->get();
            return response()->json([
                "message"=>"Berhasil mendapatkan daftar kota berdasarkan provinsi",
                "cities"=>$data
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "message"=> "Gagal mendapatkan daftar kota",
                "error"=>$th->getMessage()
            ],400);
        }
    }
}
