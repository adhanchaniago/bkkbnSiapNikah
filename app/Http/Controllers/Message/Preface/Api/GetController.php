<?php

namespace App\Http\Controllers\Message\Preface\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;

class GetController extends Controller
{
    public function getFirst(){
        $data = Message::active()->prefaceMessage()->first();
        return response()->json(['data'=>$data]);
    }
}
