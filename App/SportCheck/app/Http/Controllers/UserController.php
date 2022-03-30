<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::orderBy('name', 'desc')->whereNot('role_id', 3)->paginate(6);

        foreach ($users as $value) {
            if($this->checkUserRole($value->role_id) != 'foadmin'){
                $value->role_id = $this->checkUserRole($value->role_id);
            }
        }
        return view('Users',[
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        if($user->role_id == '1'){
            $user->role_id = '2';
        }
        else if($user->role_id == '2'){
            $user->role_id = '1';
        }
        
        $user->save();

        return redirect()->route('userlist')->with('flash_message', 'Contact Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function search(){
        $search_text = $_GET['userSearch'];
        $items = User::where('name','LIKE','%'.$search_text.'%')->get();
        foreach ($items as $value) {
            $value->role_id = $this->checkUserRole($value->role_id);
        }
        return view('Users',[
            'users' => $items
        ]);
    }
    public static function checkUserRole($id){
        $role = Role::find($id);
        return $role->name;

    }
}
