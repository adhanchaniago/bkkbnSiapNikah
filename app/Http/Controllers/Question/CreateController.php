<?php

namespace App\Http\Controllers\Question;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;

class CreateController extends Controller
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
     * Entry new question to database.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request, $categoryId){
        $question = Question::create([
            'question' => $request->question,
            'gender' => $request->gender,
            'answer' => $request->answer,
            'correctAnswerRecommendation' => $request->correctAnswerRecommendation,
            'wrongAnswerRecommendation' => $request->wrongAnswerRecommendation,
            'categoryId' => $categoryId,
        ]);
        // dd($question);
        return redirect('/category/detail/id/'.$categoryId)->with(['questionCreated'=>true]);
    }
}
