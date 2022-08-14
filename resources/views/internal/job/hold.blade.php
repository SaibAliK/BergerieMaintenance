@extends('layouts.internal')
@section('title', 'Hold Job')
@section('nav-title', 'Hold Job')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Hold Jobs List</h5>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assigned as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ date('d-m-Y', strtotime($item->created_at)) ?? 'N/A'}}</td>
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
                                <td>
                                    <a class="btn btn-danger btn-round open_modal_2" data-urls="{{route('internal.job.close.assign.job',$item->id)}}" data-toggle="modal" data-target="#staticBackdrop_2" href="javascript:;">Close Job</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
 $(document).on('click','.open_modal_2', function() {
        var urls = $(this).data('urls');
        $('.modal-pop').modal('show');
        $('#add_form_2').attr('action',urls);
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
    $('#btn-save_2').click(function() {
        if ($('#add_form_2').valid()) {
            $('#add_form_2').submit();
        }
    });
</script>
@endsection