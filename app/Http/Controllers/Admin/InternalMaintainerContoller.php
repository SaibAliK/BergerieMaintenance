<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InternalMaintainer;
use App\Models\User;
use App\Models\JobAssign;

class InternalMaintainerContoller extends Controller
{
	public function index()
	{
		$internals = InternalMaintainer::all();
		return view('admin.internal.list', get_defined_vars());
	}
	public function add()
	{
		return view('admin.internal.add');
	}
	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
		]);
		$user = User::where('role','internal')->first();
		InternalMaintainer::create([
			'name' => $request->name,
			'user_id'=> $user->id,
		]);
		return redirect()->route('admin.internal_maint.list')->with('success', 'The Internal Maintainer is Created Successfully');
	}
	public function edit($id)
	{
		$internal = InternalMaintainer::find($id);
		return view('admin.internal.edit', get_defined_vars());
	}
	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required',
		]);
		$user = User::where('role','internal')->first();
		$internal = InternalMaintainer::find($id);
		$internal->name = $request->name;
		$internal->update();
		return redirect()->route('admin.internal_maint.list')->with('success', 'The Internal Maintainer is updated successfull');
	}
	public function delete($id)
	{
		$internal = InternalMaintainer::find($id);
		$internal->delete();
		return redirect()->route('admin.internal_maint.list')->with('success', 'The department is deleted successfully');
	}
	public function assignedList($id)
	{
		$internal = InternalMaintainer::find($id);
		$assign = JobAssign::where('assign_to','internal')->where('selected_user_id',$id)->get();
		return view('admin.internal.assigned_job',get_defined_vars());
	}
}
