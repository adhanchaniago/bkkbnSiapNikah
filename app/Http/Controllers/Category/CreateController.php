<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CreateController extends Controller
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
     * Show the create category page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::orderBy('id')->get();
        return view('createCategory',compact('categories'));
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
