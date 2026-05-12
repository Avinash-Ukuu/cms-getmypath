@extends('cms.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Change Password Form</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Change Password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('cms.updatePassword') }}"
                onsubmit="document.getElementById('submit').disabled=true;">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword2">New Password</label>
                        <input type="text" class="form-control" id="exampleInputPassword2" name="password"
                            value="{{ old('password') }}" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword3">Confirm Password</label>
                        <input type="text" class="form-control" id="exampleInputPassword3" name="password_confirmation"
                            value="{{ old('password_confirmation') }}" placeholder="Confirm Password">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->
@endsection
