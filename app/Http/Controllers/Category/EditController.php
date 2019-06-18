<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class EditController extends Controller
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
    }
    
    /**
     * Show the edit category page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request,$id)
    {
        $category = Category::where('id','=',$id)->first();
        // dd($categories);
        $categorySidebarList = $request->categorySidebarList;
        $menu1 = $this->menu1;
        $menu2 = $this->menu2;
        $menu3 = $this->menu3;
        return view('editCategory',compact('menu1','menu2','menu3','category','categorySidebarList'));
    }

    /**
     * Edit category data on database.
     *
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function edit(Request $request, $id)
    {
        $category = Category::where('id','=',$id)->first();
        $category->name = $request->name;
        $category->save();
        // dd($categories);
        return redirect('/category/create')->with(['editedCategory'=>$category]);
    }
}
