@extends('layouts.internal')
@section('title', 'Closed Job')
@section('nav-title', 'Closed Job')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Closed Jobs List</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
                <div class="material-datatables mt-3 p-3">
                    <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Logged By</th>
                                <th>Reported By</th>
                                <th>Unit</th>
                                <th>Urgency Level</th> 
                                <th>Issue Category</th>
                                <th>Issue Detail</th>
                                <th>Allocation To</th>
                                <th>Allocation To Name</th>
                                <th>Allocation Comment</th>
                                <th>Closed by</th>
                                <th>Closed Comment</th>
                                <th>Closed Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assigned as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->created_at ?? "N/A"}}</td>
                                <td>
                                    {{$item->job->loggedby->name ?? "N/A"}}
                                </td>
                                <td>
                                    {{$item->job->reported_by ?? "N/A"}}
                                </td>
                                <td>
                                    {{$item->job->unit->unit_no ?? ""}} / {{$item->job->unit->name ?? "N/A"}}
                                </td>
                                <td>
                                    {{$item->job->urgency ?? "N/A"}}
                                </td>
                                <td>{{$item->job->issue->name ?? "N/A"}}</td>
                                <td>{{$item->job->issue->description ?? "N/A"}}</td>
                                <td>{{$item->assign_to ?? "N/A"}}</td>
                                <td>
                                    @if($item->assign_to=="internal")
                                        @php
                                           $name="";
                                           $name = App\Models\InternalMaintainer::where('id',$item->selected_user_id)->first();
                                        @endphp
                                        {{$name->name ?? ''}}
                                    @elseif($item->assign_to=="external")
                                        @php
                                           $name="";
                                           $name = App\Models\ExternalMaintainer::where('id',$item->selected_user_id)->first();
                                        @endphp
                                        {{$name->name ?? ''}}
                                    @else
                                    N/A
                                    @endif
                                </td>

                                <td>{{$item->comment ?? "N/A"}}</td>
                                <td>{{$item->closed_by ?? "N/A"}}</td>
                                <td>{{$item->closed_comment ?? "N/A"}}</td>
                                <td>{{$item->closed_date ?? "N/A"}}</td>
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
</div>
@endsection
@section('js')
<script type="text/javascript">

</script>
@endsection