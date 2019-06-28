<?php

namespace App\Http\Controllers\Question;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Question;

class IndexController extends Controller
{
    /**
     * Sidebar parameter
     *
     * @return void
     */
    public $menu1 = 'Category';
    public $menu2 = 'List';
    public $menu3;
    public $categoryList;
    
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
        $menu1 = $this->menu1;
        $menu2 = $this->menu2;
        $menu3 = $category->id;
        return view('questionList',compact('menu1','menu2','menu3','category','questions'));
    }

    
}
