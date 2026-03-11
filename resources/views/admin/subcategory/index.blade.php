@extends('admin.dashboard')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Sub Category</li>
        </ol>
    </div>

    <h2>Sub Category List</h2>
    <a href="{{ route('subcategory.create') }}" class="btn btn-success btn-sm mb-2">Add New SubCategory</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered" id="subcategoryTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#subcategoryTable').DataTable({
        processing: true,
        serverSide: true,
        pagingType: "numbers",
        ajax: "{{ route('subcategory.data') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'image', name: 'image' },
            { data: 'category', name: 'category' },
            { data: 'name', name: 'name' },
            { data: 'slug', name: 'slug' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush
