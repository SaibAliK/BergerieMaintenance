@extends('layouts.admin')
@section('title', 'Job Assigned')
@section('nav-title', 'Job Assigned')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">{{$external->name ?? ''}} : Jobs Assign List</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                    <div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date Raised</th>
                                    <th>Unit No</th>
                                    <th>Unit Type</th>
                                    <th>Reported By</th>
                                    <th>Logged By</th>
                                    <th>Issue Category</th>
                                    <th>Issue Detail</th>
                                    <th>Assigned To</th>
                                    <th>Assigned To Details</th>
                                    <th>Date Emailed</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assign as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->created_at ?? "N/A"}}</td>
                                    <td>{{$item->job->unit->unit_no ?? "N/A"}}</td>
                                    <td>{{$item->job->unit->name ?? "N/A"}}</td>
                                    <td>
                                        {{$item->job->reported_by ?? "N/A"}}
                                    </td>
                                    <td>
                                        {{$item->job->loggedby->name ?? "N/A"}}
                                    </td>
                                    <td>{{$item->job->issue->name ?? "N/A"}}</td>
                                    <td>{{$item->job->issue->description ?? "N/A"}}</td>
                                    <td>{{$item->assign_to ?? "N/A"}}</td>
                                    <td>{{$item->comment ?? "N/A"}}</td>
                                    <td>{{$item->date_emailed ?? "N/A"}}</td>
                                    <td>
                                        @if($item->status == "open")
                                        <span class="badge badge-success">Open</span>
                                        @elseif($item->status == "hold")
                                        <span class="badge badge-primary">Hold</span>
                                        @else
                                        <span class="badge badge-primary">Closed</span>
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