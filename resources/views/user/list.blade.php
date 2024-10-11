@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
    <h2>Daftar Pengguna</h2>
    
    <!-- Tombol untuk menuju halaman pendaftaran -->
    <a href="{{ route('register.form') }}" class="btn btn-primary mb-3">Daftar Pengguna Baru</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <!-- Add actions like edit/delete if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
