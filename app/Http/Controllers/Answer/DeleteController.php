<?php

namespace App\Http\Controllers\Answer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Answer;

class DeleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Where to redirect users after delete questionnaire.
     *
     * @var string
     */
    protected $redirectTo = '/questionnaire';

    /**
     * Delete a questionnaire instance from DB.
     *
     * @param  int $id
     * @return \App\Answer
     */
    protected function deleteQuery($id)
    {
        $answer = Answer::where('id','=',$id)->first();
        if ($answer)
            return $answer->delete();
        else
            return false;
        // dd($answer->delete());
    }

    /**
     * Delete controller.
     *
     * @return void
     */
    public function delete(Request $request, $id){
        if($this->DeleteQuery($id))
            return redirect($this->redirectTo)->with(['deletedQuestionnaireSuccessed'=>true]);
        else
            return redirect($this->redirectTo)->with(['deleteQuestionnaireFailed'=>false]);
    }

    public function index($id){
        $answer = Answer::where('id','=',$id)->first();
        return view('questionnaireDelete',compact('answer'));
    }
}
