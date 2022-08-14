<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\LoggedBy;
use App\Models\Unit;
use App\Models\Issue;
use App\Models\Staff;
use App\Models\JobAssign;
use App\Models\InternalMaintainer;
use Carbon\Carbon;
use App\Exports\AssignedJob;
use App\Exports\ArchivedExport;
use Excel;
use App\Models\ExternalMaintainer;


class JobController extends Controller
{
	public function index()
	{
		$jobs = Job::where('job_assigned','0')->with('jobAssign')->get();
		return view('admin.job.list', get_defined_vars());
	}
	public function add()
	{
		$logged_bies = LoggedBy::all();
		$units = Unit::all();
		$issues = Issue::all();
		$staff = Staff::all();
		return view('admin.job.add', get_defined_vars());
	}
	public function store(Request $request)
	{
		$request->validate([
			'date' => 'required',
			'loggedBy_id' => 'required',
			'reported_by'=>'required',
			'unit_id' => 'required',
			'urgency' => 'required',
			'issue_id' => 'required',
			'description' => 'required',
		]);
		if ($request->reported_by == 'staffd') {
			$request->validate([
				'staff_id' => 'required',
			]);
		}
		if ($request->reported_by == 'resident') {
			$request->validate([
				'resident' => 'required',
			]);
		}
		$date = Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');
		Job::create([ 

			'date' => $date,
			'loggedBy_id' => $request->loggedBy_id,
			'reported_by' => $request->reported_by,
			'unit_id' => $request->unit_id,
			'urgency' => $request->urgency,
			'issue_id' => $request->issue_id,
			'description' => $request->description,
			'staff_id' => $request->staff_id,
			'resident' => $request->resident,
		]);
		return redirect()->route('admin.job.list')->with('success', 'The Job is Created Successfully');
	}

	public function edit($id)
	{
		$job = Job::find($id);
		$logged_bies = LoggedBy::all();
		$units = Unit::all();
		$issues = Issue::all();
		$staff = Staff::all();
		return view('admin.job.edit', get_defined_vars());
	}

	public function update(Request $request, $id)
	{
		//dd($request->all());
		$request->validate([
			'date' => 'required',
			'loggedBy_id' => 'required',
			'reported_by' => 'required',
			'unit_id' => 'required',
			'urgency' => 'required',
			'issue_id' => 'required',
			'description' => 'required',
		]);
		if ($request->reported_by == 'staffd') {
			$request->validate([
				'staff_id' => 'required',
			]);
		}
		if ($request->reported_by == 'resident') {
			$request->validate([
				'resident' => 'required',
			]);
		}
	    //$date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
	    //dd($date);
		$job = Job::find($id);
		//$job->date = $date;
		if($job->date == $request->date)
		{
			$job->date = $request->date;
		}
		else
		{
			$job->date = Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');
		}
		$job->loggedBy_id = $request->loggedBy_id;
		$job->reported_by = $request->reported_by;
		$job->unit_id = $request->unit_id;
		$job->urgency = $request->urgency;
		$job->issue_id = $request->issue_id;
		$job->description = $request->description;
		$job->staff_id = $request->staff_id;
		$job->resident = $request->resident;
		$job->update();

		return redirect()->route('admin.job.list')->with('success', 'The Job is updated successfull');
	}
	public function delete($id)
	{
		$Job = Job::find($id);
		$Job->delete();
		return redirect()->route('admin.job.list')->with('success', 'The Job is deleted successfully');
	}
	public function deleteAssignJob($id)
	{
		$Job = JobAssign::find($id);
		$Job->delete();
		return redirect()->back()->with('success', 'The Assigned Job is deleted successfully');
	}
	public function assignJob($id)
	{
		$job = Job::find($id);
		if ($job) {
			$internal_maints = InternalMaintainer::all();
			$external_maints = ExternalMaintainer::all();

			return view('admin.job.assign', get_defined_vars());
		} else {
			return redirect()->back()->with('error', 'Job not found');
		}
	}

	public function saveAssign(Request $request)
	{
		//dd($request->all());
		$date = date('Y-m-d');
		$job = Job::find($request->job_id);

		$request->validate([
			'assign_to' => 'required',
			'closure_date' => 'required',
		]);
		$date = Carbon::createFromFormat('d-m-Y', $request->closure_date)->format('Y-m-d');

		if ($request->assign_to == "internal") {
			$request->validate([
				'internal_maintainer_id' => 'required',
			]);
			JobAssign::create([
				'job_id' => $request->job_id,
				'assign_to' => $request->assign_to,
				'comment' => $request->comment,
				'closure_date' => $date,
				'status' => "open",
				'selected_user_id' => $request->internal_maintainer_id,
			]);

			$job->job_assigned = 1;
			$job->save();
		}
		if ($request->assign_to == "external") {
			$request->validate([
				'external_maintainer_id' => 'required',
			]);
			if($request->cc)
			{
				$request->validate([
					'email' => 'required|email',
				]);
			}
			JobAssign::create([
				'job_id' => $request->job_id,
				'assign_to' => $request->assign_to,
				'comment' => $request->comment,
				'closure_date' => $date,
				'status' => "open",
				'date_emailed' => $date,
				'selected_user_id' => $request->external_maintainer_id,
			]);

			$job->job_assigned = 1;
			$job->save();

			$external = ExternalMaintainer::find($request->external_maintainer_id);
			sendMail([
				'view' => 'emails.job_assign',
				'subject' => 'Job Assign ' .  $external->name,
				'to' => $external->email,
				'data' => [
					'external' => $external,
					'job' => $job
				]
			]);
			if($request->cc)
			{
				sendMail([
					'view' => 'emails.job_assign',
					'subject' => 'Job Assign ' .  $external->name,
					'to' => $request->email,
					'data' => [
						'external' => $external,
						'job' => $job
					]
				]);
			}
			sendMail([
				'view' => 'emails.job_assign',
				'subject' => 'Job Assign ' .  $external->name,
				'to' => "info@bergerietrust.ie",
				'data' => [
					'external' => $external,
					'job' => $job
				]
			]);
		}
		return redirect()->route('admin.job.assigned')->with('success', 'Job Assign Successfully');
	}
	public function archiveList(Request $request)
	{
		$job_assign = JobAssign::where('status','archive');

		if (isset($request->from) && isset($request->to)) {

			$from =  Carbon::createFromFormat('d-m-Y', $request->from)->format('Y-m-d H:i:s');
			$to =  Carbon::createFromFormat('d-m-Y', $request->to)->format('Y-m-d H:i:s');

			$job_assign = $job_assign->whereBetween('created_at', array($from, $to));
		} else if (isset($request->from) && !isset($request->to)) {

			$from =  Carbon::createFromFormat('d-m-Y', $request->from)->format('Y-m-d H:i:s');

			$job_assign = $job_assign->where('created_at', '>', $from);
		} else if (!isset($request->from) && isset($request->to)) {
			$to =  Carbon::createFromFormat('d-m-Y', $request->to)->format('Y-m-d H:i:s');

			$job_assign = $job_assign->where('created_at', '<', $to);
		}
		$job_assign = $job_assign->get();
		if ($request->export) {
			return Excel::download(new ArchivedExport($job_assign), 'archived.xlsx');
		}

		return view('admin.job.archive',get_defined_vars());
	}

	public function assigned(Request $request)
	{
		$job_assigneds = JobAssign::all();
		if($request->export)
		{
			return Excel::download(new AssignedJob($job_assigneds), 'Assigned_Job.xlsx');
		}
		return view('admin.job.assigned', get_defined_vars());
	}

	public function closeAssignJob(Request $request, $id)
	{
		$date = date('Y-m-d');
		$assign = JobAssign::find($id);
		$assign->status = 'closed';
		$assign->closed_comment = $request->closed_comment;
		$assign->closed_date = $date;
		$assign->closed_by = $request->name;
		$assign->save();
		return redirect()->back()->with('success','Status changed Successfully');
	}
	public function archiveJob($id)
	{
		$assign = JobAssign::find($id);
		$assign->status = 'archive';
		$assign->save();  
		return redirect()->back()->with('success','Archived Job Successfully');
	}
	public function openAssignJob($id)
	{
		$assign = JobAssign::find($id);
		$assign->status = 'open';
		$assign->save();
		return redirect()->back()->with('success','Status changed Successfully');
	}
	public function editAssignedJob($id)
	{
		$assign = JobAssign::find($id);
		$internal_maints = InternalMaintainer::all();
		$external_maints = ExternalMaintainer::all();
		return view('admin.job.edit_assign' , get_defined_vars());
	}
	public function updateAssignedJob(Request $request, $id)
	{
		//dd($request->all());
		$date = date('Y-m-d');
		$job = Job::find($request->job_id);

		$request->validate([
			'assign_to' => 'required',
			'closure_date' => 'required',
		]);
		if ($request->assign_to == "internal") {
			$request->validate([
				'internal_maintainer_id' => 'required',
			]);
			$assign = JobAssign::find($id);
			$assign->job_id = $request->job_id;
			$assign->assign_to = $request->assign_to;
			$assign->comment = $request->comment;
			$assign->closure_date = $request->closure_date;
			$assign->selected_user_id = $request->internal_maintainer_id;
			$assign->save();
		}
		if ($request->assign_to == "external") {
			$request->validate([
				'external_maintainer_id' => 'required',
			]);
			$assign = JobAssign::find($id);
			$assign->job_id = $request->job_id;
			$assign->assign_to = $request->assign_to;
			$assign->comment = $request->comment;
			$assign->closure_date = $request->closure_date;
			$assign->selected_user_id = $request->external_maintainer_id;
			$assign->date_emailed = $date;
			$assign->save();

			$external = ExternalMaintainer::find($request->external_maintainer_id);
			sendMail([
				'view' => 'emails.job_assign',
				'subject' => 'Job Assign' . $external->name,
				'to' => $external->email,
				'data' => [
					'external' => $external,
					'job' => $job
				]
			]);
		}
		return redirect()->route('admin.job.assigned')->with('success','Assigned Job Update Successfully');
	}

	public function closed()
	{
		$assigned = JobAssign::where('status','closed')->get();
		return view('admin.job.closed',get_defined_vars());
	}
}
