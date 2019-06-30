<?php

namespace App\Http\Controllers\Message\Preface;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $messages = Message::where('type','=','preface')->get();
        return view('message.preface',compact('messages'));
    }
}
