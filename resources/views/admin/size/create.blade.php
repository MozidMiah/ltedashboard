@extends('admin.dashboard')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Size</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Size</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Size Form</h3>
                        </div>

                        <form action="{{ route('size.store') }}" method="POST">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Size Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Size Name">
                                    @error('name')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="active" name="status"
                                            value="1" checked>
                                        <label for="active" class="custom-control-label">
                                            Active
                                        </label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="inactive" name="status"
                                            value="0">
                                        <label for="inactive" class="custom-control-label">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Size
                                </button>
                                <a href="{{ route('size.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
