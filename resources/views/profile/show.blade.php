<!-- resources/views/profile/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="profile-header text-center mb-4">
        @if($user->avatar)
            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="rounded-circle" style="width: 200px; height: 200px;">
        @else
            <img src="{{ asset('default-avatar.png') }}" alt="Default Avatar" class="rounded-circle" style="width: 200px; height: 200px;">
        @endif
        <h2>{{ $user->name }}</h2>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>

        <tr>
            <th>Role</th>
            <td>{{ $user->role }}</td>
        </tr>
    </table>
</div>
@endsection
