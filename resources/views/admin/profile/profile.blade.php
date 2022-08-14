@extends('layouts.admin')
@section('title', 'Profile')
@section('nav-title', 'Profile')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Profile</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{--<div class="col-md-3">
                                <div class="form-group">
                                    <label for="hero_section_image">Image</label>
                                    <input type="file" name="avatar"  class="dropify" data-default-file="{{ asset(Auth::User()->avatar) ?? '' }}" accept=".png, .jpg, .jpeg, .gif,.svg">
                                </div>
                            </div>--}}
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" value="{{$user->name ?? ''}}" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{$user->email ?? ''}}" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection



