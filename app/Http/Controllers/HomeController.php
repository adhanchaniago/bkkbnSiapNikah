<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Sidebar parameter
     *
     * @return void
     */
    public $menu1 = 'Dashboard';

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $menu1 = $this->menu1;
        $menu2 = null;
        $menu3 = null;
        $categorySidebarList = $request->categorySidebarList;
        // dd($request->categorySidebarList);
        return view('home',compact('menu1','menu2','menu3','categorySidebarList'));
    }
}
