@extends('admin.dashboard')

@section('content')
    <div class="container mt-3">
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Coupon</li>
            </ol>
        </div>

        <h2>Coupon List</h2>
        <a href="{{ route('coupon.create') }}" class="btn btn-success btn-sm mb-2">Add New</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered" id="couponTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Code</th>
                    <th>Discount</th>
                    <th>Min Amount</th>
                    <th>Start At</th>
                    <th>Expire At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#couponTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('coupon.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'discount',
                        name: 'discount'
                    },
                    {
                        data: 'min_amount',
                        name: 'min_amount'
                    },
                    {
                        data: 'start_at',
                        name: 'start_at'
                    },
                    {
                        data: 'expire_at',
                        name: 'expire_at'
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
