<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DeleteController extends Controller
{
    public $menu1 = 'UserManagement';
    public $menu2 = '';
    public $menu3;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('categories');
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
    public function index(Request $request, $userId)
    {
        $user = User::where('id','=',$userId)->first();
        $menu1 = $this->menu1;
        $menu2 = $this->menu2;
        $menu3 = $this->menu3;
        $categorySidebarList = $request->categorySidebarList;
        return view('deleteUser',compact('menu1','menu2','menu3','categorySidebarList','user'));
    }
}
