@extends('layouts.internal')
@section('title', 'Dashboard')
@section('nav-title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon"><i class="material-icons">work</i></div>
                    <p class="card-category">Total Assigned Jobs</p>
                    <h3 class="card-title">{{$job_count ?? '0'}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats"><i class="material-icons">work</i> Total # of Assign Job</div>
                </div>
            </div>
        </div>
        {{--<div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">work</i></div>
                    <p class="card-category">Open Jobs</p>
                    <h3 class="card-title">{{$open_job ?? '0'}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats"><i class="material-icons">work</i> Total # of Open Job</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="material-icons">work</i></div>
                    <p class="card-category">Closed Jobs</p>
                    <h3 class="card-title">{{$closed_job ?? '0'}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats"><i class="material-icons">work</i> Total # of Closed Job</div>
                </div>
            </div>
        </div>--}}
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon"><i class="material-icons">work</i></div>
                    <p class="card-category">Hold Jobs</p>
                    <h3 class="card-title">{{$hold_job ?? "0"}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats"><i class="material-icons">work</i> Total # of Hold Job</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
