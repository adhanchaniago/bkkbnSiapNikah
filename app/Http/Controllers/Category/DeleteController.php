<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class DeleteController extends Controller
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

    public function index(Request $request,$categoryId){
        $categorySidebarList = $request->categorySidebarList;
        $category = Category::where('id','=',$categoryId)->first();
        $menu1 = $this->menu1;
        $menu2 = $this->menu2;
        $menu3 = $categoryId;
        return view('deleteCategory',compact('menu1','menu2','menu3','categorySidebarList','category'));
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
        return redirect($this->redirectTo)->with(['categoryDeleted'=> true]);
    }
}
