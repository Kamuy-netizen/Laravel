@extends('layouts.app') <!-- Jika Anda menggunakan layout -->

@section('content')
<div class="container">
    <h1>Edit Service</h1>

    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('storage/' . $service->image) }}" alt="Current Image" width="100">
        </div>
        <div class="form-group">
            <label for="deskripsi">Description:</label>
            <textarea name="deskripsi" class="form-control" required>{{ $service->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
