@extends('admin.dashboard')

@section('content')
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Sub Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Add Subcategory</li>
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
                            <h3 class="card-title">Sub Category Form</h3>
                        </div>

                        <form action="{{ route('subcategory.store') }}" method="POST" enctype="multipart/form-data">
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

                                <!-- Parent Category Select -->
                                <div class="form-group">
                                    <label>Parent Category <span class="text-danger">*</span></label>
                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- SubCategory Name -->
                                <div class="form-group">
                                    <label>SubCategory Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter SubCategory Name">
                                    @error('name')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Slug -->
                                <div class="form-group">
                                    <label>Slug <span class="text-danger">*</span></label>
                                    <input type="text" id="slug" name="slug" value="{{ old('slug') }}"
                                        class="form-control @error('slug') is-invalid @enderror" placeholder="Enter slug">
                                    @error('slug')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label>SubCategory Description</label>
                                    <textarea name="description" rows="4" class="form-control" placeholder="Enter Description">{{ old('description') }}</textarea>
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label>SubCategory Image</label>
                                    <input type="file" name="image" class="form-control dropify" />
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Publication Status</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="published" name="status"
                                            value="1" checked>
                                        <label for="published" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="unpublished" name="status"
                                            value="0">
                                        <label for="unpublished" class="custom-control-label">Inactive</label>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save SubCategory
                                </button>
                                <a href="{{ route('subcategory.index') }}" class="btn btn-secondary">Cancel</a>
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
