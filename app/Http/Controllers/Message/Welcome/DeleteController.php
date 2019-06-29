<?php

namespace App\Http\Controllers\Message\Welcome;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;

class DeleteController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Delete a questionnaire instance from DB.
     *
     * @param  int $id
     * @return \App\Answer
     */
    protected function deleteQuery($id)
    {
        $message = Message::where('id','=',$id)->first();
        if ($message)
            return $message->delete();
        else
            return false;
    }

    public function delete(Request $request, $id){
        if($this->deleteQuery($id)){
            return back()->with(['success-deleted'=>true]);
        }
        else{
            return back()->with(['error'=> "Pesan tidak ditemukan"]);
        }
    }
}
