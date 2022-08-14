<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Issue;

class IssueController extends Controller
{
	public function index(){
		$issues = Issue::all();
		return view('admin.issues.list',get_defined_vars());    
	}

	public function add()
	{
		return view('admin.issues.add');
	}
	public function store(Request $request)
	{
		$request->validate([
			'name'=>'required',
			'description'=>'required',
		]);
		Issue::create([
			'name'=>$request->name,
			'description'=>$request->description,
			//'user_id'=> ,
		]);
		return redirect()->route('admin.issues.list')->with('success','The Issue is Created Successfully');
	}

	public function edit($id)
	{
		$issues = Issue::find($id);
		return view('admin.issues.edit',get_defined_vars());
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'name'=>'required',
			'description'=>'required',
		]);
		$issues = Issue::find($id);
		$issues->name = $request->name;
		$issues->description = $request->description;
		$issues->update();
		return redirect()->route('admin.issues.list')->with('success','The Issue is updated successfull');
	}
	public function delete($id)
	{
		$issues = Issue::find($id);
		$issues->delete();
		return redirect()->route('admin.issues.list')->with('success','The Unit is deleted successfully');
	}
}
