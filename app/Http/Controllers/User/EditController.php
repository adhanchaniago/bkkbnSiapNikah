<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class EditController extends Controller
{
    public $menu1 = 'UserManagement';
    public $menu2 = '';
    public $menu3;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function update(array $data, $userId)
    {
        $user = User::where('id','=',$userId)->first();
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $userId)
    {
        $this->validator($request->all())->validate();
        $user = $this->update($request->all(),$userId);
        return redirect($this->redirectTo)->with(['userUpdated'=>$user]);
    }

    /**
     * Show the user edit page.
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
        return view('editUser',compact('menu1','menu2','menu3','categorySidebarList','user'));
    }
}
