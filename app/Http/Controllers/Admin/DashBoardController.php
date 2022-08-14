<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobAssign;

class DashBoardController extends Controller
{

	public function index()
	{
		$unassigned_job_count = Job::where('job_assigned','0')->count();
		$hold_job = JobAssign::where('status','hold')->count();
		$open_job = JobAssign::where('status','open')->count();
		return view('admin.dashboard' , get_defined_vars());
	}
}
