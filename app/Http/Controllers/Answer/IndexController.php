<?php

namespace App\Http\Controllers\Answer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Answer;

class IndexController extends Controller
{
    /**
     * Sidebar parameter
     *
     * @return void
     */
    public $menu1 = 'QuestionnaireResult';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('categories');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $answers = Answer::all();
        $menu1 = $this->menu1;
        $menu2 = null;
        $menu3 = null;
        // $categorySidebarList = $request->categorySidebarList;
        return view('questionnaireResult',compact('menu1','menu2','menu3','answers'));
    }
}
