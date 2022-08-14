@extends('layouts.admin')
@section('title', 'Job')
@section('nav-title', 'Job')
@section('css')<style>
    .invalid-feedback
    {
        display: block !important;
    }
</style>
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('admin.job.save')}}" method="POST" class="form_submit" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Add Job</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="date">Date</label>
                                    <input type="text" name="date" id="" class="form-control datepicker @error('date') is-invalid @enderror" value="" placeholder="Select Date" autocomplete="off">
                                    @error('date')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label for="type">Logged By</label>
                                    <select name="loggedBy_id" id="condition" class="form-control @error('loggedBy_id') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        @foreach($logged_bies as $logged)
                                        <option value="{{$logged->id}}">{{$logged->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('loggedBy_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label for="type">Reported By</label>
                                    <select id="reported_by" name="reported_by" class="form-control @error('reported_by') is-invalid @enderror">
                                        <option value="">Select</option>
                                        <option value="resident">Resident</option>
                                        <option value="staffd">Staff</option>

                                    </select>
                                    @error('reported_by')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6" style="display: none" id="resident">
                                <div class="">
                                    <label for="name">Resident</label>
                                    <input name="resident" type="text" id="resident" class="form-control @error('resident') is-invalid @enderror" placeholder="Enter Resident Name" value="{{ old('resident') }}" autocomplete="off">
                                    @error('resident')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6" style="display:none" id="staffd">
                                <div class="">
                                    <label for="type">Staff</label>
                                    <select name="staff_id" id="condition" class="form-control @error('staff_id') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        @foreach($staff as $item)
                                        <option value="{{$item->id}}">{{$item->name ?? ""}}</option>
                                        @endforeach
                                    </select>
                                    @error('staff_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label for="type">Unit </label>
                                    <select id="unit_id" name="unit_id" class="form-control @error('unit_id') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        @foreach($units as $item)
                                        <option value="{{$item->id}}" data-id="{{$item->name}}">
                                            {{$item->unit_no}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('unit_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6" style="display: none;" id="unit_name">
                                <div class="">
                                    <label for="name">Unit type</label>
                                    <input name="unit_name" type="text" class="form-control @error('unit_name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="off" readonly="">
                                    @error('unit_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label for="type">Urgency Level</label>
                                    <select name="urgency" id="condition" class="form-control @error('urgency') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        <option value="normal">Normal</option>
                                        <option value="urgent">Urgent</option>
                                    </select>
                                    @error('urgency')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label for="issue">Issue Type</label>
                                    <select name="issue_id" id="" class="form-control @error('issue_id') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        @foreach($issues as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('issue_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}
                                        </select></strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="">
                                    <label for="description">Issue Description</label>
                                    <textarea name="description" class="form-control" id="" cols="" rows="5" placeholder="Issue description..."></textarea>
                                    @error('description')
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
    $("#reported_by").change(function() {
        var selected_value = $(this).children("option:selected").val();
        if (selected_value == "resident") {
            $('#resident').show();
            $('#staffd').hide();
        }
        if (selected_value == "staffd") {
            $('#resident').hide();
            $('#staffd').show();
        } else {
            // alert("d");
        }
    });
    $("#unit_id").change(function() {
        var selected_value = $(this).find(':selected').data('id');
        $('input[name="unit_name"]').val(selected_value);
        $('#unit_name').show();
    });
    /*$('input[name="date"]').on('keypress ',function(e){
         e.preventDefault();
        return false;
    });*/
    $("#submit_btn").click(function(e) {
      $(this).prop('disabled', true);
      e.preventDefault();
      $(".form_submit").submit();
  });
</script>
@endsection