@extends('admin.dashboard')

@section('content')
    {{-- <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> --}}

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Category Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <h4 class="text-center text-success">{{ session('message') }}</h4>
            <form class="form-horizontal p-t-20" action="{{ route('category.update') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $categories->id }}" />
                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" value="{{ $categories->name }}"
                            id="exampleInputuname3" placeholder="Category Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail3" class="col-sm-3 control-label">Category Description <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="description">{{ $categories->description }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="form-label col-sm-3 control-label" for="web">Category Image</label>
                    <div class="col-sm-9">
                        <input type="file" name="image" id="input-file-now" class="dropify"
                            data-default-file="{{ asset($categories->image) }}" />

                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                    <div class="col-sm-9">
                        <label>
                            <input type="radio" name="status" value="0"
                                {{ $categories->status == 0 ? 'checked' : '' }}> Published
                        </label>

                        <label>
                            <input type="radio" name="status" value="2"
                                {{ $categories->status == 1 ? 'checked' : '' }}> Unpublished
                        </label>
                    </div>
                </div>
                <div class="form-group row m-b-0">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update New
                            Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
