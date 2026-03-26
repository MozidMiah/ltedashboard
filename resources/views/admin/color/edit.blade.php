@extends('admin.dashboard')

@section('content')
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Color</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('color.index') }}">Color</a>
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
                            <h3 class="card-title">Edit Color Form</h3>
                        </div>

                        <form action="{{ route('color.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $color->id }}">
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
                                    <label>Color Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $color->name) }}"
                                        class="form-control" placeholder="Enter Color Name">
                                </div>
                                
                                <div class="form-group">
                                    <label>Select Color</label>
                                    <input type="color" name="color" id="colorPicker" class="form-control"
                                        value="#ff0000">
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Publication Status</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="published" name="status" value="1"
                                            class="custom-control-input" {{ $color->status == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="published">
                                            Active
                                        </label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="unpublished" name="status" value="0"
                                            class="custom-control-input" {{ $color->status == 0 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="unpublished">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Color
                                </button>

                                <a href="{{ route('color.index') }}" class="btn btn-secondary">
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
