@extends('layouts.app') <!-- Jika Anda menggunakan layout -->

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Services</h1>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Add New Service</a>

    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($services->count() > 0)
                @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $service->image) }}" alt="Image" width="100" class="img-fluid">
                    </td>
                    <td>{{ $service->deskripsi }}</td>
                    <td>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">No services available.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
