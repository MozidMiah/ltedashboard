@extends('admin.dashboard')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('product.index') }}">Product</a>
                </li>
            </ol>
        </div>
        <h2>Product List</h2>
        <a href="{{ route('product.create') }}" class="btn btn-success btn-sm mb-2">Add New Product</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered" id="productTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount_Price</th>
                    <th>Qty</th>
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
            $('#productTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('product.data') }}",
                columns: [{
                        data: 'DT_RowIndex'
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
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'discount_price',
                        name: 'discount_price'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
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

