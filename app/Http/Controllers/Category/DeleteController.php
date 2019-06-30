<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

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

    public function index($categoryId){
        $category = Category::where('id','=',$categoryId)->first();
        return view('deleteCategory',compact('category'));
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/category/create';
    
    /**
     * Delete a question instance from DB.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function delete($categoryId)
    {
        return Category::where('id','=',$categoryId)->first()->delete();
    }

    /**
     * Handle delete question data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request, $categoryId)
    {
        $this->delete($categoryId);
        return redirect()->route('category.create.page')->with(['categoryDeleted'=> true]);
    }
}
