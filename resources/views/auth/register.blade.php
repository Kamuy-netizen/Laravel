<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom Styles -->
    <style>
        body {
            
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }
        .register-container {
            background: rgba(255, 255, 255, 0.85); /* Semi-transparan */
            padding: 20px; /* Padding lebih kecil */
            border-radius: 8px; /* Sudut bulat */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15); /* Bayangan */
            width: 100%;
            max-width: 400px; /* Lebar maksimal */
        }
        h2 {
            text-align: center;
            margin-bottom: 20px; /* Margin lebih kecil */
            color: #007bff;
            font-size: 22px; /* Ukuran font lebih kecil */
            font-weight: bold;
        }
        .form-group label {
            font-weight: bold;
            color: #495057;
        }
        .form-control, .form-control-file {
            border-radius: 5px;
        }
        .btn-primary {
            width: 100%;
            border-radius: 20px; /* Sudut bulat */
            padding: 8px; /* Padding lebih kecil */
            font-size: 14px; /* Ukuran font lebih kecil */
        }
        .alert {
            font-size: 12px; /* Pesan kesalahan lebih kecil */
        }
        p {
            text-align: center;
            margin-top: 10px; /* Margin lebih kecil */
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Registration Form -->
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <!-- Role -->
            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <!-- Avatar -->
            <div class="form-group">
                <label for="avatar">Avatar:</label>
                <input type="file" class="form-control-file"  name="avatar" accept="image/*">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <!-- Link to Login Page -->
        <p class="mt-3">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
