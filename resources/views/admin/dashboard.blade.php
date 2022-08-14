@extends('layouts.admin')
@section('title', 'Dashboard')
@section('nav-title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-right">
            <a href="{{route('admin.job.add')}}" class="btn btn-success">+ Add Job</a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon"><i class="material-icons">work</i></div>
                    <p class="card-category">Unassigned  Jobs</p>
                    <h3 class="card-title">{{$unassigned_job_count ?? '0'}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats"><i class="material-icons">work</i> Total # of Unassigned  Job</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="material-icons">work</i></div>
                    <p class="card-category">Assigned Open Jobs</p>
                    <h3 class="card-title">{{$open_job ?? '0'}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats"><i class="material-icons">work</i> Total # of Assigned Open Job</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon"><i class="material-icons">work</i></div>
                    <p class="card-category">Hold Jobs</p>
                    <h3 class="card-title">{{$hold_job ?? "0" }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats"><i class="material-icons">work</i> Total # of Hold Job</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        /*$('#minimizeSidebar').click(function(){
            $('.big-logo').toggle();
            $('.small-logo').show();
        });*/
    });
</script>
@endsection
