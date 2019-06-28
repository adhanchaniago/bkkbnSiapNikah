<?php

namespace App\Http\Controllers\Question;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;

class EditController extends Controller
{
    /**
     * Sidebar parameter
     *
     * @return void
     */
    public $menu1 = 'Category';
    public $menu2 = 'List';
    public $menu3;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($categoryId,$questionId){
        $question = Question::where('id','=',$questionId)->first();
        $menu1 = $this->menu1;
        $menu2 = $this->menu2;
        $menu3 = $categoryId;
        return view('editQuestion',compact('menu1','menu2','menu3','question','categoryId'));
    }

    /**
     * Entry new question to database.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request, $categoryId, $questionId){
        $data = $request->only('question','answer','correctAnswerRecommendation','wrongAnswerRecommendation','gender');
        $question = Question::where('id','=',$questionId)->first()->update($data);
        return redirect('/category/detail/id/'.$categoryId)->with(['questionUpdated'=>true]);
    }
}
