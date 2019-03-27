<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\User;

Use App\Permission;

class UserController extends Controller
{
    public function index(){
		//$tasks = DB::table('tasks')->latest()->get();
		$users = User::all();
		//return $tasks;
    	return view('users.index',compact('users'));
    }
	private function getPermission($id){
		//$user = User::find($name);
		$user = User::where('id', $id)->firstOrFail();
		return $user->uprawnienia;
	}
	private function getPermissionName($id){
		$permission = Permission::find($id)->name;
		//$permission = Permission::find($userRaw->uprawnienia);
		//$permission = Permission::where('id', 1);
		return $permission;
	}
    public function show($id){
		$user = User::where('id', $id)->firstOrFail();
		$uprawnienia = $this->getPermissionName($this->getPermission($id));
		$user->uprawnienia_name = $uprawnienia;
		$permissions= Permission::all();
		
		return view( 'users.show', compact('user'), compact('permissions') );
    }
	public function displayPermission(Request $request){
		$user = User::find($request->user_id);
		$user->uprawnienia = $request->uprawnienia;
		$user->save();
    	//return $request->all();
		return redirect()->back()->withErrors(["success"=>"Uprawnienia zmienione pomyślnie!"]);
	}
	
}
