<?php

namespace App\Http\Controllers\Category\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::select('id','name')->get();
        $categoriesFilled = array();
        for ($i=0; $i < count($categories); $i++) { 
            $category = $categories[$i];
            $questions = $categories[$i]->questions()->select('id', 'question', 'gender')->get();
            $obj = (object) ['category'=>$category,'questions'=>$questions];
            array_push($categoriesFilled,$obj);
        }
        $response = (object) ['status'=>200,'message'=>'Berhasil mengambil data','data'=>$categoriesFilled];
        return response()->json($response,200);
    }
}
