@extends('admin.dashboard')

@section('content')
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit SubCategory</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('subcategory.index') }}">SubCategory</a></li>
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
                            <h3 class="card-title">Edit SubCategory Form</h3>
                        </div>

                        <form action="{{ route('subcategory.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $subcategory->id }}">

                            <div class="card-body">

                                {{-- Success Message --}}
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <!-- Parent Category -->
                                <div class="form-group">
                                    <label>Parent Category <span class="text-danger">*</span></label>
                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>
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
                                    <input type="text" id="name" name="name"
                                        value="{{ old('name', $subcategory->name) }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter SubCategory Name">
                                    @error('name')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Slug -->
                                <div class="form-group">
                                    <label>Slug <span class="text-danger">*</span></label>
                                    <input type="text" id="slug" name="slug"
                                        value="{{ old('slug', $subcategory->slug) }}"
                                        class="form-control @error('slug') is-invalid @enderror" placeholder="Enter slug">
                                    @error('slug')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label>SubCategory Description</label>
                                    <textarea name="description" rows="4" class="form-control" placeholder="Enter Description">{{ old('description', $subcategory->description) }}</textarea>
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label>SubCategory Image</label>
                                    <input type="file" name="image" class="form-control dropify"
                                        data-default-file="{{ $subcategory->image ? asset($subcategory->image) : '' }}">
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Publication Status</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="published" name="status" value="1"
                                            class="custom-control-input" {{ $subcategory->status == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="published">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="unpublished" name="status" value="0"
                                            class="custom-control-input" {{ $subcategory->status == 0 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="unpublished">Inactive</label>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update SubCategory
                                </button>

                                <a href="{{ route('subcategory.index') }}" class="btn btn-secondary">
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
