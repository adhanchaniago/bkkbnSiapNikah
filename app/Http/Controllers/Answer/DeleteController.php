<?php

namespace App\Http\Controllers\Answer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Answer;

class DeleteController extends Controller
{
    /**
     * Sidebar parameter
     *
     * @return void
     */
    public $menu1 = 'QuestionnaireResult';
    public $menu2 = null;
    public $menu3 = null;

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
        // dd($answer);
        $menu1 = $this->menu1;
        $menu2 = null;
        $menu3 = null;
        return view('questionnaireDelete',compact('menu1','menu2','menu3','answer'));
    }
}
