<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class EditController extends Controller
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
     * Show the edit category page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request,$id)
    {
        $category = Category::where('id','=',$id)->first();
        return view('editCategory',compact('category'));
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
