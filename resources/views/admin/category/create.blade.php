@extends('admin.dashboard')

@section('content')
<div class="container">
    <h2>Create Category</h2>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection