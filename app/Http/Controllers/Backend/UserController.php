<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title= 'User';
        $users = User::all();
        if ($request->has('search')) {
            $users = User::where('username','like',"%{$request->search}%")
                ->orWhere('email','like',"%{$request->search}%")->get();
        }
        return view('backend.users.index',compact(['title','users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title= 'Create User';
        return view('backend.users.create',compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  App\Http\Requests\UserStoreReques  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        User::create([
            'username' => $request['username'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('user.index')->with('message','User Register Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title= 'Update User';
        return view('backend.users.edit',compact(['title','user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update([
            'username' => $request['username'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
        ]);
        return redirect()->route('user.index')->with('message','User Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( User $user )
    {
        if (auth()->user()->id ==  $user->id) {
            return redirect()->route('user.index')->with('message','You are deleting yourself.');
        }
        $user->delete();
        return redirect()->route('user.index')->with('message','User Delete Successfully');
    }
}
