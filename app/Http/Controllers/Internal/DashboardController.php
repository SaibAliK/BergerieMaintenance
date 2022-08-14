<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobAssign;
use App\Models\Job;
use Carbon\Carbon;
use App\Models\InternalMaintainer;
use App\Exports\AssignedJob;
use Excel;

class DashboardController extends Controller
{
	public function index()
	{
		$job_count = JobAssign::where('assign_to','internal')->where('status','open')->count();
		$hold_job = JobAssign::where('assign_to','internal')->where('status','hold')->count();
		$closed_job = JobAssign::where('assign_to','internal')->where('status','closed')->count();
		$open_job = JobAssign::where('assign_to','internal')->where('status','open')->count();
		return view('internal.dashboard' , get_defined_vars());
	}

	public function jobList(Request $request)
	{
		$internals = InternalMaintainer::all();
		$assigns = JobAssign::where('assign_to','internal')->where('status','open')->get();
		if($request->export)
		{
			return Excel::download(new AssignedJob($assigns), 'Assigned_Job.xlsx');
		}
		return view('internal.job.assigned' , get_defined_vars());
	}

	public function holdJob(Request $request, $id)
	{
		$assigned = JobAssign::find($id);
		$date = date('Y-m-d');
		if($assigned)
		{
			$assigned->status = "hold";
			$assigned->hold_comment = $request->hold_comment;
			$assigned->closed_date = $date;
			$assigned->hold_by = $request->hold_by;
			$assigned->save();
			return redirect()->back()->with('success','Job status is changed succesfully');
		}
		return redirect()->back()->with('error','Job not found');
	}
	public function archiveJob($id)
	{
		$assign = JobAssign::find($id);
		$assign->status = 'archive';
		$assign->save();  
		return redirect()->back()->with('success','Archived Job Successfully');
	}

	public function closeJob(Request $request, $id)
	{
		$assigned = JobAssign::find($id);
		$date = date('Y-m-d');
		if($assigned)
		{
			$assigned->status = "closed";
			$assigned->closed_comment = $request->closed_comment;
			$assigned->closed_date = $date;
			$assigned->closed_by = $request->closed_by;
			$assigned->save();
			return redirect()->back()->with('success','Job status is changed succesfully');
		}
		return redirect()->back()->with('error','Job not found');
	}
	public function closedJob()
	{
		$assigned = JobAssign::where('assign_to','internal')->where('status','closed')->get();
		return view('internal.job.closed',get_defined_vars());
	}
	public function holdJobList()
	{
		$internals = InternalMaintainer::all();
		$assigned = JobAssign::where('assign_to','internal')->where('status','hold')->get();
		return view('internal.job.hold',get_defined_vars());
	}
}
