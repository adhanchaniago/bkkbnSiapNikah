<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CreateController extends Controller
{
    /**
     * Sidebar parameter
     *
     * @return void
     */
    public $menu1 = 'Category';
    public $menu2 = 'Create';
    public $menu3 = null;
    
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
     * Show the create category page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = Category::orderBy('id')->get();
        // dd($request->categorySidebarList);
        $categorySidebarList = $request->categorySidebarList;
        $menu1 = $this->menu1;
        $menu2 = $this->menu2;
        $menu3 = $this->menu3;
        return view('createCategory',compact('menu1','menu2','menu3','categories','categorySidebarList'));
    }

    /**
     * POST new category to database.
     *
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function create(Request $request)
    {
        $category = Category::create([
            'name' => $request->name
        ]);
        return redirect('/category/create')->with(['category'=>$category]);
    }
}
