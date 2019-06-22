<?php

namespace App\Http\Controllers\Question;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;

class DeleteController extends Controller
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
        $this->middleware('categories');
    }

    public function index(Request $request,$categoryId,$questionId){
        $categorySidebarList = $request->categorySidebarList;
        $question = Question::where('id','=',$questionId)->first();
        $menu1 = $this->menu1;
        $menu2 = $this->menu2;
        $menu3 = $categoryId;
        return view('deleteQuestion',compact('menu1','menu2','menu3','question','categorySidebarList','categoryId'));
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
        return Question::where('id','=',$questionId)->first()->forceDelete();
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
