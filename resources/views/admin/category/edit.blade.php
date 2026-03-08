@extends('admin.dashboard')

@section('content')
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('category.index') }}">Category</a>
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
                            <h3 class="card-title">Edit Category Form</h3>
                        </div>

                        <form action="{{ route('category.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}">

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
                                    <label>Category Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name', $category->name) }}"
                                        class="form-control" placeholder="Enter Category Name">
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label>Category Description <span class="text-danger">*</span></label>
                                    <textarea name="description" rows="4" class="form-control" placeholder="Enter Description">{{ old('description', $category->description) }}</textarea>
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label>Category Image</label>
                                    <input type="file" name="image" class="form-control dropify"
                                        data-default-file="{{ asset($category->image) }}">
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Publication Status</label>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="published" name="status" value="1"
                                            class="custom-control-input" {{ $category->status == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="published">
                                            Published
                                        </label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="unpublished" name="status" value="0"
                                            class="custom-control-input" {{ $category->status == 0 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="unpublished">
                                            Unpublished
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Category
                                </button>

                                <a href="{{ route('category.index') }}" class="btn btn-secondary">
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
