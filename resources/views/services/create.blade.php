@extends('layouts.app') <!-- Jika Anda menggunakan layout -->

@section('content')
<div class="container">
    <h1>Add New Service</h1>

    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Description:</label>
            <textarea name="deskripsi" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
