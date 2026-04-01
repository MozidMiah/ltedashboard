@extends('admin.dashboard')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Flash Sale</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('flash-sale.index') }}">Flash Sale</a>
                        </li>
                        <li class="breadcrumb-item active">Create</li>
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
                            <h3 class="card-title">Create Flash Sale</h3>
                        </div>

                        <form action="{{ route('flash-sale.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <!-- Name -->
                                <div class="form-group">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">

                                    @error('name')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Enter Description">{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <!-- Thumbnail -->
                                <div class="form-group">
                                    <label>Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control form-control dropify" />

                                    @error('thumbnail')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <!-- Start Date -->
                                <div class="form-group">
                                    <label>Start Date <span class="text-danger">*</span></label>
                                    <input type="datetime-local" id="start_date" name="start_date"
                                        value="{{ old('start_date') }}"
                                        class="form-control @error('start_date') is-invalid @enderror"
                                        placeholder="Enter Date">

                                    @error('start_date')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <!-- End Date -->
                                <div class="form-group">
                                    <label>End Date <span class="text-danger">*</span></label>
                                    <input type="datetime-local" id="end_date" name="end_date"
                                        value="{{ old('end_date') }}"
                                        class="form-control @error('end_date') is-invalid @enderror"
                                        placeholder="Enter Date">

                                    @error('end_date')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Status</label>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="active" name="status" value="active"
                                            class="custom-control-input" checked>
                                        <label class="custom-control-label" for="active">Active</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="inactive" name="status" value="inactive"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="inactive">Inactive</label>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Save
                                </button>

                                <a href="{{ route('flash-sale.index') }}" class="btn btn-secondary">
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
