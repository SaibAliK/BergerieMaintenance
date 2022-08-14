<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExternalMaintainer;
use App\Models\JobAssign;


class ExternalMaintainerContoller extends Controller
{
	public function index()
	{
		$external = ExternalMaintainer::all();
		return view('admin.external.list', get_defined_vars());
	}
	public function add()
	{
		return view('admin.external.add');
	}
	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'email' => 'required|Email',
			'category' => 'required',
		]);
		ExternalMaintainer::create([
			'name' => $request->name,
			'email' => $request->email,
			'category' => $request->category,
		]);
		return redirect()->route('admin.external_maint.list')->with('success', 'The external Maintainer is Created Successfully');
	}
	public function edit($id)
	{
		$external = ExternalMaintainer::find($id);
		return view('admin.external.edit', get_defined_vars());
	}
	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required',
			'email' => 'required',
			'category' => 'required',
		]);
		$external = ExternalMaintainer::find($id);
		$external->name = $request->name;
		$external->email = $request->email;
		$external->category = $request->category;

		$external->update();
		return redirect()->route('admin.external_maint.list')->with('success', 'The external Maintainer is updated successfull');
	}
	public function delete($id)
	{
		$external = ExternalMaintainer::find($id);
		$external->delete();
		return redirect()->route('admin.external_maint.list')->with('success', 'The department is deleted successfully');
	}
	public function assignedList($id)
	{
		$external = ExternalMaintainer::find($id);
		$assign = JobAssign::where('assign_to','external')->where('selected_user_id',$id)->get();
		return view('admin.external.assigned_job',get_defined_vars());
	}
}
