    @extends('layouts.admin')
    @section('title', 'Archived Job')
    @section('nav-title', 'Archived Job')
    @section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon"><i class="material-icons">list</i></div>
                        <h5 class="card-title">Archived Jobs List</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form method="GET" action="#">
                                <div class="row">
                                    <div class="col-md-12">
                                     <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-body">
                                                <div class="form-group ">
                                                    <div class="col-md-12">
                                                        <label>Date From</label>
                                                        <input type="text" id="" name="from" value="{{$request->from ?? ''}}" placeholder="Start Date" class="form-control datepicker input-lg" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-body">
                                                <div class="form-group ">
                                                    <div class="col-md-12">
                                                        <label>Date To</label>
                                                        <input type="text" id="" name="to" value="{{$request->to ?? ''}}" placeholder="End Date" class="form-control datepicker input-lg" autocomplete="off">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4" style="margin-top: 16px">
                                            <div class="btn-group mt-3" role="group" aria-label="Basic example">
                                              <button type="submit" class="btn btn-success">Filter</button>
                                              <button type="button" class="btn btn-info reset">Reset</button>
                                              <button type="submit" name="export" value="export" class="btn btn-danger">Export</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($job_assign as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ date('d-m-Y', strtotime($item->created_at)) ?? ''}}</td>
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
                            <td>{{$item->job->description ?? "N/A"}}</td>
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
                            <td>{{ date('d-m-Y', strtotime($item->closed_date)) ?? ''}}</td>
                            <td>
                                <a href="{{route('admin.job.delete.assign.job',$item->id)}}" rel="tooltip" class="btn btn-danger btn-round" data-original-title="delete job" title="delete job">
                                 Delete
                             </a>
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
</div>
@endsection
@section('js')
<script>
  $('.reset').click(function() {
    var uri = window.location.toString();
    if (uri.indexOf("?") > 0) {
      var clean_uri = uri.substring(0, uri.indexOf("?"));
      window.history.replaceState({}, document.title, clean_uri);
      location.reload();
  }
});
</script>
@endsection
