@extends('admin.dashboard')

@section('content')
    <div class="container mt-3">
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Ads</li>
            </ol>
        </div>
        <h2>Ads List</h2>
        <a href="{{ route('ads.create') }}" class="btn btn-success btn-sm mb-2">Add New</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered" id="adsTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Thumbnail</th>
                    <th>Title</th>
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
            $('#adsTable').DataTable({
                processing: true,
                serverSide: true,
                pagingType: "numbers",
                ajax: "{{ route('ads.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'thumbnail',
                        name: 'thumbnail'
                    },
                    {
                        data: 'title',
                        name: 'title'
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
