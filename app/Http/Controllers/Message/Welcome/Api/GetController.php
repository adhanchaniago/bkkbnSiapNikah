<?php

namespace App\Http\Controllers\Message\Welcome\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;

class GetController extends Controller
{
    public function __construct() {
        // $this->middleware('auth');
    }

    public function get($id){
        $data = Message::find($id);
        return response()->json(['data'=>$data]);
    }
    public function getFirst(){
        $data = Message::active()->welcomeMessage()->first();
        return response()->json(['data'=>$data]);
    }
}
