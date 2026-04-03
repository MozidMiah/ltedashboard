@extends('admin.dashboard')

@section('content')
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('banner.index') }}">Banner</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Banner Form</h3>
                        </div>

                        <form action="{{ route('banner.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}
                            <input type="hidden" name="id" value="{{ $banner->id }}">

                            <div class="card-body">
                                {{-- Success Message --}}
                                @if (session('message'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        {{ session('message') }}
                                        <button type="button" class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <!-- Category Name -->
                                <div class="form-group">
                                    <label>Banner Title <span class="text-danger">*</span></label>
                                    <input type="text" id="banner" name="banner"
                                        value="{{ old('title', $banner->title) }}" class="form-control"
                                        placeholder="Enter Banner Title">
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label>Thumbnail</label>
                                    <input type="file" name="title" class="form-control dropify"
                                        data-default-file="{{ $banner->thumbnail ? asset($banner->thumbnail) : '' }}">
                                </div>


                                <!-- Status -->
                                <div class="form-group">
                                    <label>Publication Status</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="published" name="status" value="1"
                                            class="custom-control-input" {{ $banner->status == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="published">
                                            Active
                                        </label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="unpublished" name="status" value="0"
                                            class="custom-control-input" {{ $banner->status == 0 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="unpublished">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Banner
                                </button>

                                <a href="{{ route('banner.index') }}" class="btn btn-secondary">
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
