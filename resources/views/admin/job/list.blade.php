@extends('layouts.admin')
@section('title', 'Job')
@section('nav-title', 'Job')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Jobs List</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="toolbar text-right">
                                <a href="{{route('admin.job.add')}}" class="btn btn-success">+ Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Logged By</th>
                                    <th>Reported By</th>
                                    <th>Resident</th>
                                    <th>Staff</th>
                                    <th>Unit Type</th>
                                    <th>Urgency Level</th>
                                    <th>Issues</th>
                                    <th>Issue Description</th>
                                    <th>Created</th>
                                    <th>Job Assigned</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->date)) ?? 'N/A'}}</td>
                                    <td>{{$item->loggedby->name ?? "N/A"}}</td>
                                    <td>
                                        @if($item->reported_by=="staffd")
                                        <span class="badge badge-info">Staff</span>
                                        @else
                                        <span class="badge badge-info">Resident</span>
                                        @endif
                                    </td>
                                    <td>{{$item->resident ?? "N/A"}}</td>
                                    <td>{{$item->staff->name ?? "N/A"}}</td>
                                    <td>{{$item->unit->name ?? "N/A"}}</td>
                                    <td>{{$item->urgency ?? "N/A"}}</td>
                                    <td>{{$item->issue->name ?? "N/A"}}</td>
                                    <td>{{$item->description ?? "N/A"}}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->created_at)) ?? 'N/A'}}</td>
                                    <td>
                                        @if($item->job_assigned == 1)
                                        <span class="badge badge-success">Yes</span>
                                        @else
                                        <span class="badge badge-primary">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->job_assigned==0)
                                        <a href="{{route('admin.job.edit', $item->id)}}" rel="tooltip" class="btn btn-success btn-round" data-original-title="Edit" title="Edit">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button type="button" onclick="deleteAlert('{{ route('admin.job.delete', $item->id) }}')" rel="tooltip" class="btn btn-danger btn-round delete-btn" data-original-title="Delete" title="Delete">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <a href="{{route('admin.job.assign', $item->id)}}"  class="btn btn-info btn-round"  title="Assign Job">
                                            Assign Job
                                        </a>
                                        @elseif($item->job_assigned == 1)
                                        <a href="{{route('admin.job.edit', $item->id)}}" rel="tooltip" class="btn btn-success btn-round" data-original-title="Edit" title="Edit">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button type="button" onclick="deleteAlert('{{ route('admin.job.delete', $item->id) }}')" rel="tooltip" class="btn btn-danger btn-round delete-btn" data-original-title="Delete" title="Delete">
                                            <i class="material-icons">close</i>
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection