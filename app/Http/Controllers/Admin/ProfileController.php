<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
	public function profile()
	{
		$user = Auth::user();
		if($user->role=="admin")
		{
			return view('admin.profile.profile',get_defined_vars());
		}
	}
	public function resetPassoord()
	{
		$user = Auth::user();
		if($user->role=="admin")
		{
			return view('admin.profile.reset-password',get_defined_vars());
		}
	}

	public function profileUpdate(Request $request)
	{
	    //dd($request->all());
		$user = Auth::user();
		if($request->name)
		{
			$user->name = $request->name;
		}
		if($request->email !== $user->email)
		{
			$request->validate([
				'email' =>'required|email',
			]);
			$user->email = $request->email;
		}
		$user->save();
		if($request->oldpassword) {
			$this->validate($request, [
				'oldpassword' => 'required',
				'newpassword'  => 'required|min:8',
				'confirm_password' =>'required|same:newpassword'
			]);
			$user->password = Hash::make($request->newpassword);
			$user->save();
			Auth::logout();
			return redirect('/');
		}
		
		return redirect()->back()->with('success','Profile Updated successfully');
	}
}
