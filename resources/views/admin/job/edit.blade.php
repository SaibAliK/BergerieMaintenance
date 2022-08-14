@extends('layouts.admin')
@section('title', 'Job')
@section('nav-title', 'Job')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form class="validate-form" action="{{ route('admin.job.update', $job->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">edit</i>
                        </div>
                        <h5 class="card-title">Edit Job</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="date">Date</label>
                                    <input type="text" name="date" id="" class="form-control datepicker @error('date') is-invalid @enderror" value="{{$job->date ?? ''}}" autocomplete="off">
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
                                        <option value="{{$logged->id}}" {{ $job->loggedBy_id == $logged->id ? 'selected' : '' }}>{{$logged->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('loggedBy_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6" style="display: none;">
                                <div class="">
                                    <label for="type">Reported By</label>
                                    <select  id="reported_by" name="reported_by" class="form-control">
                                        <option value="" disabled selected>Select</option>
                                        <option value="resident" {{ $job->reported_by == "resident" ? 'selected' : '' }}>Resident</option>
                                        <option value="staffd" {{ $job->reported_by == "staffd" ? 'selected' : '' }}>Staff</option>
                                    </select>
                                    @error('reported_by')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @if($job->reported_by=="resident")
                            <div class="col-md-6">
                                <div class="">
                                    <label for="name">Resident</label>
                                    <input name="resident" type="text" id="resident" class="form-control @error('resident') is-invalid @enderror" placeholder="Enter Resident Name" value="{{$job->resident ?? ''}}" autocomplete="off">
                                    @error('resident')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @else
                            <div class="col-md-6">
                                <div class="">
                                    <label for="type">Staff</label>
                                    <select name="staff_id" id="condition" class="form-control @error('staff_id') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        @foreach($staff as $item)
                                        <option value="{{$item->id}}" {{ $job->staff_id == $item->id ? 'selected' : '' }}>{{$item->name ?? ""}}</option>
                                        @endforeach
                                    </select>
                                    @error('staff_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <div class="">
                                    <label for="type">Unit </label>
                                    <select id="unit_id" name="unit_id" class="form-control @error('unit_id') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        @foreach($units as $item)
                                        <option value="{{$item->id}}" {{ $job->unit_id == $item->id ? 'selected' : '' }}>
                                            {{$item->name ?? ""}} /
                                            {{$item->unit_no ?? ""}}
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
                            <div class="col-md-6">
                                <div class="">
                                    <label for="type">Urgency Level</label>
                                    <select name="urgency" id="condition" class="form-control @error('urgency') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        <option value="normal" {{ $job->urgency == "normal" ? 'selected' : '' }}>Normal</option>
                                        <option value="urgent" {{ $job->urgency == "urgent" ? 'selected' : '' }}>Urgent</option>
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
                                    <label for="issue">Issues</label>
                                    <select name="issue_id" id="" class="form-control @error('issue_id') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        @foreach($issues as $item)
                                        <option value="{{$item->id}}" {{ $job->issue_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
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
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="" cols="" rows="5" placeholder="Issue description...">{{$job->description ?? ''}}</textarea>
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
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection