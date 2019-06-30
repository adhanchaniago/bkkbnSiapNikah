<?php

namespace App\Http\Controllers\Message\Preface;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Support\Facades\Validator;

class CreateController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    protected function validator(array $data){
        return Validator::make($data,[
            'message' => ['required', 'string'],
        ]);
    }

    public function create(Request $request){
        $this->validator($request->all())->validate();
        try {
            $message = Message::create([
                'message'=>$request->message,
                'type'=>'preface',
                'isActive'=>true
            ]);
            return back()->with(['success'=>$message]);
        } catch (\Throwable $th) {
            return back()->with(['error'=>$th->getMessage()]);
        }
    }
}
