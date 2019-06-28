<?php

namespace App\Http\Controllers\Question;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;

class EditController extends Controller
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

    public function index($categoryId,$questionId){
        $question = Question::where('id','=',$questionId)->first();
        return view('editQuestion',compact('question','categoryId'));
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
