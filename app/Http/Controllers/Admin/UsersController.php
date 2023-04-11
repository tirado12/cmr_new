<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$roles=User::with('roles')->paginate(10);
         $roles=User::with('roles')->get();
         
         $roles_list=Role::all();

        // return $roles[1]->roles[0]->name;
        return view('admin.users.index',compact('roles','roles_list'));
        //return $roles[0]->roles[0]->name;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'roles' => 'required'
        ]);
        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
        ])->assignRole($request->roles);
        
        return redirect()->route('admin.users.index');
        //return $request;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles=Role::all();
        return view('admin.users.edit',compact('user','roles'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data=$request->all();
        $user->roles()->sync($request->roles);
        if(empty($data['password'])){
            $request->validate([
                'name' => 'required',
                'email' => 'required'
            ]);
            $data['password'] = $user->password;
            $user->update($data);
        }else{
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);
            $data['password'] = bcrypt($data['password']);
            $user->update($data);
        }
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('eliminar','ok');
    }
}
