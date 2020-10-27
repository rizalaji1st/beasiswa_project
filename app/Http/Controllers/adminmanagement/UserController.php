<?php

namespace App\Http\Controllers\adminmanagement;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('pages.admin.adminmanagement.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        if(Gate::denies('edit-users')){
            return redirect(route('admin.users.index'))->with('danger', 'Anda tidak diperbolehkan mengedit user!');
        }
        $roles = Role::all();
        return view('pages.admin.adminmanagement.update', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user->roless()->sync($request->roles);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        if(Gate::denies('delete-users')){
            return redirect(route('admin.users.index'))->with('danger', 'Anda tidak diperbolehkan menghapus user!');;
        }

        $user->roless()->detach();
        $user->delete();
        return redirect()->route('admin.users.index');

    }
}
