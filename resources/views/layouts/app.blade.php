<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Web')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            height: 100vh;
            padding: 20px;
            position: fixed;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            display: block;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #e2e6ea; 
        }
        .sidebar a.active {
            background-color: green; 
            color: white;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>TAMBAH</h4>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="{{ route('services.index') }}" class="{{ request()->is('services') ? 'active' : '' }}">Tambah Service</a></li>
            <li><a href="{{ route('mbps.index') }}" class="{{ request()->is('mbps') ? 'active' : '' }}">Tambah Mbps</a></li>
            <li><a href="{{ route('profile.show') }}" class="{{ request()->is('profile') ? 'active' : '' }}">Profile</a></li>
            

            @if(auth()->user()->role === 'admin')
                <li><a href="{{ route('user.list') }}" class="{{ request()->is('user-list') ? 'active' : '' }}">User List</a></li>
            @endif
            <li><a href="{{ route('website.index') }}" class="{{ request()->is('website') ? 'active' : '' }}">Back to Website</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-warning">Logout</a>
        </ul>
    </div>

    <!-- Content Area -->
    <div class="content">
        @yield('content')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
