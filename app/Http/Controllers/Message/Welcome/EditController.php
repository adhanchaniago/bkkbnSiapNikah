<?php

namespace App\Http\Controllers\Message\Welcome;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Message;

class EditController extends Controller
{
    protected function validator(array $data){
        return Validator::make($data,[
            'message' => ['required', 'string'],
            'isActive' => ['required', Rule::in([0,1])]
        ]);
    }

    public function edit(Request $request,$id){
        $validation = $this->validator($request->all());
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        try {
            $message = Message::find($id)->update($request->all());
            return back()->with(['success-edited'=>$message]);
        } catch (\Throwable $th) {
            return back()->with(['error'=>$th->getMessage()]);
        }
    }
}
