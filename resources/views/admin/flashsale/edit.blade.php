@extends('admin.dashboard')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Flash Sale</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('flash-sale.index') }}">Flash Sale</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
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
                            <h3 class="card-title">Edit Flash Sale</h3>
                        </div>

                        <form action="{{ route('flash-sale.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <!-- Name -->
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control">
                                </div>

                                <!-- Thumbnail -->
                                <div class="form-group">
                                    <label>Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control dropify"
                                        data-default-file="{{ asset($data->thumbnail) }}">
                                </div>

                                <!-- Start Date -->
                                <div class="form-group">
                                    <label>Start Date *</label>
                                    <input type="datetime-local" name="start_date"
                                        value="{{ date('Y-m-d\TH:i', strtotime($data->start_date)) }}" class="form-control">
                                </div>

                                <!-- End Date -->
                                <div class="form-group">
                                    <label>End Date *</label>
                                    <input type="datetime-local" name="end_date"
                                        value="{{ date('Y-m-d\TH:i', strtotime($data->end_date)) }}" class="form-control">
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Status</label>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="active" name="status" value="active"
                                            class="custom-control-input" {{ $data->status == 'active' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="active">Active</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="inactive" name="status" value="inactive"
                                            class="custom-control-input" {{ $data->status == 'inactive' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="inactive">Inactive</label>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="4">{{ $data->description }}</textarea>
                                </div>

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update
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
