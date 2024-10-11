<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mbps Package</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Mbps Package</h1>

        <form action="{{ route('mbps.update', $mbps->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $mbps->name }}" required>
            </div>
            
        
                

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required>{{ $mbps->deskripsi }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
