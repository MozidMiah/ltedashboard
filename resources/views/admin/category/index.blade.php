@extends('admin.dashboard')

@section('content')
    <div class="container mt-3">
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </div>
        <h2>Category List</h2>
        <a href="{{ route('category.create') }}" class="btn btn-success btn-sm mb-2">Add New</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered" id="categoryTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Slug</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable({
                processing: true,
                serverSide: true,
                pagingType: "numbers",
                ajax: "{{ route('category.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endpush
