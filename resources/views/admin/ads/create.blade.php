@extends('admin.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Ads</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Add Ads</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ads Form</h3>
                        </div>

                        <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                {{-- Success Message --}}
                                @if (session('message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('message') }}
                                        <button type="button" class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <!-- Category Name -->
                                <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Enter Ads Title">

                                    @error('title')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label>Thumbnail <span class="text-danger">*</span></label>
                                    <input type="file" name="thumbnail" class="form-control form-control dropify" />

                                    @error('thumbnail')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Publication Status</label>

                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="published" name="status"
                                            value="1" checked>
                                        <label for="published" class="custom-control-label">
                                            Active
                                        </label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="unpublished" name="status"
                                            value="2">
                                        <label for="unpublished" class="custom-control-label">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Ads
                                </button>

                                <a href="{{ route('ads.index') }}" class="btn btn-secondary">
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

@push('scripts')
    <script>
        $('.dropify').dropify();
    </script>
@endpush
