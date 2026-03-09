@extends('admin.dashboard')

@section('content')
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Brand</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('brand.index') }}">Brand</a>
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
                            <h3 class="card-title">Edit Brand Form</h3>
                        </div>

                        <form action="{{ route('brand.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $brand->id }}">

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
                                    <label>Brand Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $brand->name) }}"
                                        class="form-control" placeholder="Enter Brand Name">
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label>Brand Description <span class="text-danger">*</span></label>
                                    <textarea name="description" rows="4" class="form-control" placeholder="Enter Brand Description">{{ old('description', $brand->description) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Slug <span class="text-danger">*</span></label>
                                    <input type="text" id="slug" name="slug" value="{{ old('slug', $brand->slug) }}"
                                        class="form-control" placeholder="Enter slug">
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label>Brand Logo</label>
                                    <input type="file" name="logo" class="form-control dropify"
                                        data-default-file="{{ asset($brand->logo) }}">
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Publication Status</label>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="published" name="status" value="1"
                                            class="custom-control-input" {{ $brand->status == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="published">
                                            Active
                                        </label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="unpublished" name="status" value="0"
                                            class="custom-control-input" {{ $brand->status == 0 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="unpublished">
                                            Inactive
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Brand
                                </button>

                                <a href="{{ route('brand.index') }}" class="btn btn-secondary">
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
