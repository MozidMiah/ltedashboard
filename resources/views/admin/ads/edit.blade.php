@extends('admin.dashboard')

@section('content')
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Ad</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('ads.index') }}">Ads</a>
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
                            <h3 class="card-title">Edit Ad Form</h3>
                        </div>

                        <form action="{{ route('ads.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $ad->id }}">

                            <div class="card-body">
                                {{-- Success Message --}}
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <!-- Ad Title -->
                                <div class="form-group">
                                    <label>Ad Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ old('title', $ad->title) }}"
                                        class="form-control" placeholder="Enter Ad Title" required>
                                </div>

                                <!-- Thumbnail -->
                                <div class="form-group">
                                    <label>Ad Thumbnail <span class="text-danger">*</span></label>
                                    <input type="file" name="thumbnail" class="form-control dropify"
                                        data-default-file="{{ $ad->thumbnail ? asset($ad->thumbnail) : '' }}">
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Status</label>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="active" name="status" value="1"
                                            class="custom-control-input" {{ $ad->status == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="active">
                                            Active
                                        </label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="inactive" name="status" value="0"
                                            class="custom-control-input" {{ $ad->status == 0 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="inactive">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Ad
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
