<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
	public function index()
	{
		$units = Unit::all();
		return view('admin.unit.list', get_defined_vars());
	}
	public function add()
	{
		return view('admin.unit.add');
	}
	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'unit_no' => 'required',
		]);
		Unit::create([
			'name' => $request->name,
			'unit_no' => $request->unit_no,
			//'user_id'=> ,
		]);
		return redirect()->route('admin.unit.list')->with('success', 'The Unit is Created Successfully');
	}
	public function edit($id)
	{
		$unit = Unit::find($id);
		return view('admin.unit.edit', get_defined_vars());
	}
	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required',
			'unit_no' => 'required',
		]);
		$unit = Unit::find($id);
		$unit->name = $request->name;
		$unit->unit_no = $request->unit_no;
		$unit->update();
		return redirect()->route('admin.unit.list')->with('success', 'The Unit is updated successfull');
	}
	public function delete($id)
	{
		$unit = Unit::find($id);
		$unit->delete();
		return redirect()->route('admin.unit.list')->with('success', 'The Unit is deleted successfully');
	}
}
