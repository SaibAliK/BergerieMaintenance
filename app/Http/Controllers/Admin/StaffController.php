<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
	public function index()
	{

		$staff = Staff::all();
		return view('admin.staff.list', get_defined_vars());
	}
	public function add()
	{

		return view('admin.staff.add');
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
		]);
		Staff::create([
			'name' => $request->name,
		]);
		return redirect()->route('admin.staff.list')->with('success', 'The Staff is Created Successfully');
	}

	public function edit($id)
	{
		$staff = Staff::find($id);
		return view('admin.staff.edit', get_defined_vars());
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required',
		]);
		$staff = Staff::find($id);
		$staff->name = $request->name;
		$staff->update();
		return redirect()->route('admin.staff.list')->with('success', 'The Staff is updated successfull');
	}
	public function delete($id)
	{
		$staff = staff::find($id);
		$staff->delete();
		return redirect()->route('admin.staff.list')->with('success', 'The Staff is deleted successfully');
	}
}
