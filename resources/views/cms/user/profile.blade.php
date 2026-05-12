@extends('cms.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Profile</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('cms.updateProfile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        {{-- Name --}}
                        <div class="form-group col-4">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name ?? '') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-group col-4">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('name', $user->email ?? '') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="form-group col-4">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">

                            @if (isset($object) && $user->image)
                                <div class="mt-2">
                                    <img src="{{ asset('assets/uploads/users/' . $user->image) }}" width="120" class="img-thumbnail">
                                </div>
                            @endif
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>


                </form>
            </div>


        </div>
    </div>
@endsection
