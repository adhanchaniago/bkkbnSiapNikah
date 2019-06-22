<?php

namespace App\Http\Controllers\Category\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use ___PHPSTORM_HELPERS\object;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::all();
        $categoriesFilled = array();
        for ($i=0; $i < count($categories); $i++) { 
            $category = $categories[$i];
            $questions = $categories[$i]->questions()->get();
            $obj = (object) ['category'=>$category,'questions'=>$questions];
            array_push($categoriesFilled,$obj);
        }
        return $categoriesFilled;
    }
}
