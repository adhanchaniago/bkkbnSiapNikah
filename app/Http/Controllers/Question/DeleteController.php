<?php

namespace App\Http\Controllers\Question;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;

class DeleteController extends Controller
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
        return view('deleteQuestion',compact('question','categoryId'));
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/category/detail/id/';
    
    /**
     * Delete a question instance from DB.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function delete($questionId)
    {
        return Question::where('id','=',$questionId)->first()->delete();
        // $categoryId = $question->categoryId;
        // $question->forceDelete();
        // return $categoryId;
    }

    /**
     * Handle delete question data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request, $categoryId, $questionId)
    {
        $this->delete($questionId);
        return redirect($this->redirectTo.$categoryId)->with(['questionDeleted'=> true]);
    }
}
