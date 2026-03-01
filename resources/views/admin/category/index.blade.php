@extends('admin.dashboard')

@section('content')
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <div class="content-header">
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
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Category List</h3>

                        <div class="col-md-7 align-self-center text-end">
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="{{ route('category.create') }}" type="button"
                                    class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
                                        class="fa fa-plus-circle"></i> Create New</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Category Name</th>
                                    <th>Category Description</th>
                                    <th>Category Image</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $categories->name }}</td>
                                        <td>{{ $categories->description }}</td>
                                        <td><img src="{{ asset($categories->image) }}" alt="{{ $categcategoriesory->name }}"
                                                height="50" width="80" /></td>
                                        <td>{{ $categories->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            @if ($categories->status == 2)
                                                <a href="{{ route('category.status', $categories->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="ti-arrow-up"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('category.status', $categories->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="ti-arrow-down"></i>
                                                </a>
                                            @endif

                                            <a href="{{ route('category.edit', $categories->id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="ti-pencil"></i>
                                            </a>

                                            <a href="{{ route('category.delete', $categories->id) }}"
                                                class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?');">
                                                <i class="ti-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
