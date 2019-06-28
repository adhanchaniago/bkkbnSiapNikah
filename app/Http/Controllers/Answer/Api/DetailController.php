<?php

namespace App\Http\Controllers\Answer\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Answer;

class DetailController extends Controller
{
    public function get($id){
        $answer = Answer::find($id);
        // dd($answer);
        // $answer = (array)$answer['answer'];
        return response()->json([
            'data'=>$answer
        ]);
    }
}
