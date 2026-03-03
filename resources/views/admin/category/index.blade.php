@extends('admin.dashboard')

@section('content')
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            {{-- Success Message --}}
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category List</h3>

                    <div class="card-tools">
                        <a href="{{ route('category.create') }}" class="btn btn-info btn-sm">
                            <i class="fas fa-plus-circle"></i> Create New
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th>SL NO</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" height="50"
                                            width="80" class="img-thumbnail">
                                    </td>
                                    <td>
                                        @if ($category->status == 1)
                                            <span class="badge badge-success">
                                                Published
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">
                                                Unpublished
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Status Toggle --}}
                                        @if ($category->status == 1)
                                            <a href="{{ route('category.status', $category->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('category.status', $category->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fas fa-arrow-up"></i>
                                            </a>
                                        @endif

                                        {{-- Edit --}}
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        {{-- Delete --}}
                                        <a href="{{ route('category.delete', $category->id) }}"
                                            class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-danger">
                                        No Data Found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
@endsection
