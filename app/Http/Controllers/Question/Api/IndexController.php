<?php

namespace App\Http\Controllers\Question\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;

class IndexController extends Controller
{
    public function index(){
        return Question::all();
    }
}
