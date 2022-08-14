@extends('layouts.admin')
@section('title', 'Job Assign')
@section('nav-title', 'Job Assign') 
@section('css')
<style>
    .closure {
        margin-top:1px !important;
    }
</style>
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10" style="margin: auto;">
            <form class="form_submit" action="{{route('admin.job.save.assign')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title"> Job Assign</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Assign To</h3>
                            </div>
                            <div class="col-md-6 col-6">
                                <input type="hidden" value="{{$job->id}}" name="job_id">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="assign_to" type="radio" value="internal" required="">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>Internal Maintenance
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="assign_to" type="radio" value="external" required="">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>External Maintenance
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 ">
                                <div class="form-group closure">
                                    <label for="date">Target Closure Date</label>
                                    <input type="text" name="closure_date" id="" class="form-control datepicker @error('closure_date') is-invalid @enderror" placeholder="Select Date" value="" autocomplete="off" required="">
                                    @error('closure_date')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6" style="display: none;" id="internal">
                                <div class="">
                                    <label for="internal_maintainer_id">Internal Maintenance</label>
                                    <select name="internal_maintainer_id" class="form-control @error('internal_maintainer_id') is-invalid @enderror" >
                                        <option value="" disabled selected>Select</option>
                                        @foreach($internal_maints as $internal)
                                        <option value="{{$internal->id}}">{{$internal->name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                    @error('internal_maintainer_id')
                                    <span class="invalid-feedback">
                                        {{--<strong>{{ $message }}</strong>--}}
                                        <strong>The Internal Maintenance ID Field is required</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6" style="display: none;" id="external">
                                <div class="">
                                    <label for="type">External Maintenance</label>
                                    <select name="external_maintainer_id" id="condition" class="form-control @error('external_maintainer_id') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        @foreach($external_maints as $external)
                                        <option value="{{$external->id}}">{{$external->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('external_maintainer_id')
                                    <span class="invalid-feedback">
                                        {{--<strong>{{ $message }}</strong>--}}
                                        <strong>The External Maintenance ID Field is required</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-6 " id="cc_checkbox" style="display: none;">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="cc" type="checkbox" value="cc" required="">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>CC External Maintenance
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 " style="display: none;" id="cc_email">
                                <div class="form-group closure">
                                    <label for="date">CC External Maintenance</label>
                                    <input type="text" name="email" id="" class="form-control @error('cc_email') is-invalid @enderror" placeholder="Enter Email" value="" autocomplete="off">
                                    @error('cc_email')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comment">Assigned comment</label>
                                    <textarea name="comment" class="form-control" id="" cols="" rows="5" placeholder="Comment For Person Fixing"></textarea>
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
                        <button type="button" id="submit_btn" class="btn btn-primary">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $('input[name="assign_to"]').change(function() {

        var selected_value = $('input[name="assign_to"]:checked').val();
        if (selected_value == "internal") {
            $('#internal').show();
            $('#external').hide();
            $("#cc_checkbox").hide();
        }
        if (selected_value == "external") {
            $("#cc_checkbox").show();
            $('#internal').hide();
            $('#external').show();
        }
    });

    $(document).on('change','input[name="cc"]',function() { 
        if($(this).is(':checked'))
        {
            $('#cc_email').show();
        }
        else
        {
            $('#cc_email').hide();
        }
        var selected_value = $('input[name="cc"]:checked');
        if (selected_value == "cc") {
            $('#cc_email').show();
        }
    });

    $('input[name="closure_date"]').on('keypress ',function(e){
     e.preventDefault();
     return false;
 });
    $("#submit_btn").click(function(e) {
      $(this).prop('disabled', true);
      e.preventDefault();
      $(".form_submit").submit();
  });
</script>
@endsection