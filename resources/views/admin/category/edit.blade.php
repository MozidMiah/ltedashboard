@extends('admin.dashboard')

@section('content')
<div class="container">
    <h2>Edit Category</h2>

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection