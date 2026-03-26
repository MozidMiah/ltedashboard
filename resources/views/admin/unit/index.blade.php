@extends('admin.dashboard')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Unit</li>
        </ol>
    </div>

    <h2>Unit List</h2>
    <a href="{{ route('unit.create') }}" class="btn btn-success btn-sm mb-2">Add New Unit</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered" id="unitTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
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
    $('#unitTable').DataTable({
        processing: true,
        serverSide: true,
        pagingType: "numbers",
        ajax: "{{ route('unit.data') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush
