<?php

namespace App\Http\Controllers\Answer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Answer;

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
        return view('questionnaireResult',compact('answers'));
    }
}
