@extends('layouts.admin')
@section('title', 'Edit Job Assign')
@section('nav-title', 'Edit Job Assign')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10" style="margin: auto;">
            <form class="" action="{{route('admin.job.update.asisgned',$assign->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Edit Job Assign</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Edit Assign Job To</h3>
                            </div>
                            <div class="col-md-6 col-6">
                                <input type="hidden" value="{{$assign->job_id}}" name="job_id">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="assign_to" type="radio" value="internal" required="" {{ $assign->assign_to == "internal" ? 'checked' : '' }}>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>Internal Maintainer
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="assign_to" type="radio" value="external" required="" {{ $assign->assign_to == "external" ? 'checked' : '' }}>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>External Maintainer
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Closure Date</label>
                                    <input type="date" name="closure_date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{$assign->closure_date ?? ''}}" autocomplete="off" required="">
                                    @error('closure_date')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6" style="display: none;" id="internal">
                                <div class="">
                                    <label for="internal_maintainer_id">Internal Maintainer</label>
                                    <select name="internal_maintainer_id" class="form-control @error('internal_maintainer_id') is-invalid @enderror" >
                                        <option value="" disabled selected>Select</option>
                                        @foreach($internal_maints as $internal)
                                        <option value="{{$internal->id}}" {{ $assign->selected_user_id == $internal->id ? 'selected' : '' }}>{{$internal->name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                    @error('internal_maintainer_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6" style="display: none;" id="external">
                                <div class="">
                                    <label for="type">External Maintainer</label>
                                    <select name="external_maintainer_id" id="condition" class="form-control @error('external_maintainer_id') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        @foreach($external_maints as $external)
                                        <option value="{{$external->id}}" {{ $assign->selected_user_id == $external->id ? 'selected' : '' }}>{{$external->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('external_maintainer_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <textarea name="comment" class="form-control" id="" cols="" rows="5" placeholder="Comment For Person Fixing">{{$assign->comment ?? ''}}</textarea>
                                    @error('comment')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer mt-4">
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        var assign = $('input[name="assign_to"]:checked').val();
        if (assign == "internal") {
            $('#internal').show();
            $('#external').hide();
        }
        if (assign == "external") {
            $('#internal').hide();
            $('#external').show();
        }
        $('input[name="assign_to"]').change(function() {
            var selected_value = $('input[name="assign_to"]:checked').val();
            if (selected_value == "internal") {
                $('#internal').show();
                $('#external').hide();
            }
            if (selected_value == "external") {
                $('#internal').hide();
                $('#external').show();
            }
        });
    });
</script>
@endsection