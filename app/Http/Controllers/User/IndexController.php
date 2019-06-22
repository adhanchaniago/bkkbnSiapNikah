<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class IndexController extends Controller
{
    /**
     * Sidebar parameter
     *
     * @return void
     */
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
     * Show the user management page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $users = User::all();
        $menu1 = $this->menu1;
        $menu2 = $this->menu2;
        $menu3 = $this->menu3;
        $categorySidebarList = $request->categorySidebarList;
        return view('userManagement',compact('menu1','menu2','menu3','categorySidebarList','users'));
    }
}
