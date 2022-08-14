@extends('layouts.internal')
@section('title', 'Job Assigned')
@section('nav-title', 'Job Assigned')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Jobs Assigned List</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                         <form method="GET" accept="#">
                            <button type="submit" name="export" value="export" class="btn btn-info pull-right">Export</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="material-datatables mt-3 p-3">
                <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date Raised</th>
                            <th>Closure Date</th>
                            <th>Unit No</th>
                            <th>Unit Type</th>
                            <th>Reported By</th>
                            <th>Logged By</th>
                            <th>Issue Type</th>
                            <th>Issue Detail</th>
                            <th>Assigned To</th>
                            <th>Assigned Comment</th>
                            <th>Date Emailed</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assigns as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ date('d-m-Y', strtotime($item->created_at)) ?? 'N/A'}}</td>
                            <td>{{ date('d-m-Y', strtotime($item->closure_date)) ?? 'N/A'}}</td>
                            <td>{{$item->job->unit->unit_no ?? "N/A"}}</td>
                            <td>{{$item->job->unit->name ?? "N/A"}}</td>
                            <td>
                                @if($item->job->reported_by=="staffd")
                                Staff
                                @elseif($item->job->reported_by=="resident")
                                Resient
                                @else
                                N/A
                                @endif
                            </td>
                            <td>
                                {{$item->job->loggedby->name ?? "N/A"}}
                            </td>
                            <td>{{$item->job->issue->name ?? "N/A"}}</td>
                            <td>{{$item->job->description ?? "N/A"}}</td>
                            <td>
                                @if($item->assign_to == "internal")
                                <?php
                                $inter = App\Models\InternalMaintainer::find($item->selected_user_id);
                                ?>
                                {{ $inter->name ?? 'N/A'}}
                                @else
                                {{$item->assign_to ?? 'N/A'}}
                                @endif
                            </td>
                            <td>{{$item->comment ?? "N/A"}}</td>
                            <td>
                                @if($item->date_emailed)
                                {{ date('d-m-Y', strtotime($item->date_emailed)) ?? 'N/A'}}
                                @else
                                N/A
                                @endif
                            </td>
                            <td>
                                @if($item->status == "open")
                                <span class="badge badge-success">Open</span>
                                @elseif($item->status == "hold")
                                <span class="badge badge-warning">Hold</span>
                                @elseif($item->status == "archive")
                                <span class="badge badge-warning">Archive</span>
                                @else
                                <span class="badge badge-danger">Closed</span>
                                @endif
                            </td>
                            <td>
                                @if($item->status == "hold")
                                {{--<a class="btn btn-danger btn-round open_modal_2" data-urls="{{route('internal.job.close.assign.job',$item->id)}}" data-toggle="modal" data-target="#staticBackdrop_2" href="javascript:;">Close Job</a>--}}
                                @elseif($item->status == "open")
                                <a class="btn btn-warning btn-round open_modal" data-urls="{{route('internal.job.hold.assign.job',$item->id)}}" data-toggle="modal" data-target="#staticBackdrop" href="javascript:;">Hold Job</a>
                                <a class="btn btn-danger btn-round open_modal_2" data-urls="{{route('internal.job.close.assign.job',$item->id)}}" data-toggle="modal" data-target="#staticBackdrop_2" href="javascript:;">Close Job</a>
                                @elseif($item->status == "archive")
                                @else
                                <a href="{{route('internal.job.archive.assign.job',$item->id)}}" rel="tooltip" class="btn btn-primary btn-round" data-original-title="archive job" title="archive job">
                                   Archive Job
                               </a>
                               @endif
                           </td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>
   </div>
   <div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width: 80%;margin:auto; ">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Hold Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="add_form">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="">
                            <label for="type" class="">Name</label>
                            <select name="name" id="name" class="form-control" required="">
                                <option value="" disabled selected>Select</option>
                                @foreach($internals as $internal)
                                <option value="{{$internal->name}}">{{$internal->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Hold Comment</label>
                            <textarea class="form-control" name="hold_comment" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary" id="btn-save">Save</button>
                <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div></div>

<div class="modal fade modal-pop" id="" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel_2" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width: 80%;margin:auto; ">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel_2">Closed Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="add_form_2">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="">
                            <label for="type" class="">Name</label>
                            <select name="name" id="name" class="form-control" required="">
                                <option value="" disabled selected>Select</option>
                                @foreach($internals as $internal)
                                <option value="{{$internal->name}}">{{$internal->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Closed Comment</label>
                            <textarea class="form-control" name="closed_comment" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary" id="btn-save_2">Save</button>
                <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
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
    $(document).on('click','.open_modal', function() {
        var urls = $(this).data('urls');
        $('#staticBackdrop1').modal('show');
        $('#add_form').attr('action',urls);
    });
    $(document).on('click','.open_modal_2', function() {
        var urls = $(this).data('urls');
        $('.modal-pop').modal('show');
        $('#add_form_2').attr('action',urls);
    });
    $("#add_form").validate({
        rules: {
            name: {
                required: true
            },
            hold_comment: {
                required: true
            },
        },
    });
    $("#add_form_2").validate({
        rules: {
            name: {
                required: true
            },
            closed_comment: {
                required: true
            },
        },
    });
    $(document).on('click', '.close', function(e) {
        $(this).empty();
    });
    $('#btn-save').click(function() {
        if ($('#add_form').valid()) {
            $('#add_form').submit();
        }
    });
    $('#btn-save_2').click(function() {
        if ($('#add_form_2').valid()) {
            $('#add_form_2').submit();
        }
    });
</script>
@endsection