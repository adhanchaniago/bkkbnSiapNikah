<?php

namespace App\Http\Controllers\Question;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Question;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the create category page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request,$id)
    {
        $category = Category::where('id','=',$id)->first();
        $questions = Question::where('categoryId','=',$id)->get();
        return view('questionList',compact('category','questions'));
    }

    
}
