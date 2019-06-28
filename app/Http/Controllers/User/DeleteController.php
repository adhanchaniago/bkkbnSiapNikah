<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DeleteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user-management';
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function delete($userId)
    {
        $user = User::where('id','=',$userId)->first();
        $name = $user->name;
        $user->forceDelete();
        return $name;
    }

    /**
     * Handle delete user data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request, $userId)
    {
        $name = $this->delete($userId);
        return redirect($this->redirectTo)->with(['userDeleted'=> $name]);
    }

    /**
     * Show the user delete page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($userId)
    {
        $user = User::where('id','=',$userId)->first();
        return view('deleteUser',compact('user'));
    }
}
