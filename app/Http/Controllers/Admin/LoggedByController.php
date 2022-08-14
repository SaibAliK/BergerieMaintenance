<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoggedBy;

class LoggedByController extends Controller
{
	public function index()
	{

		$logged_by = LoggedBy::all();
		return view('admin.logged_by.list', get_defined_vars());
	}
	public function add()
	{

		return view('admin.logged_by.add');
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
		]);
		LoggedBy::create([
			'name' => $request->name,
			//'user_id'=> ,
		]);
		return redirect()->route('admin.logged_by.list')->with('success', 'The Logged By is Created Successfully');
	}

	public function edit($id)
	{
		$logged_by = LoggedBy::find($id);
		return view('admin.logged_by.edit', get_defined_vars());
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required',
		]);
		$logged_by = LoggedBy::find($id);
		$logged_by->name = $request->name;
		$logged_by->update();
		return redirect()->route('admin.logged_by.list')->with('success', 'The Logged By is updated successfull');
	}
	public function delete($id)
	{
		$logged_by = LoggedBy::find($id);
		$logged_by->delete();
		return redirect()->route('admin.logged_by.list')->with('success', 'The Logged By is deleted successfully');
	}
}
