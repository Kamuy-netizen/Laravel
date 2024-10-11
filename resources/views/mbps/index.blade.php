@extends('layouts.app') <!-- Update to match the name of your layout file -->

@section('content') <!-- Begin the content section -->
    <div class="container">
        <h1>Mbps </h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('mbps.create') }}" class="btn btn-primary">Add New Mbps </a>

        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mbps as $mbpsPackage)
                <tr>
                    <td>{{ $mbpsPackage->id }}</td>
                    <td>{{ $mbpsPackage->name }}</td>
                    <td>
                    
                    </td>
                    <td>{{ $mbpsPackage->deskripsi }}</td>
                    <td>
                        <a href="{{ route('mbps.edit', $mbpsPackage->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('mbps.destroy', $mbpsPackage->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection <!-- End the content section -->
