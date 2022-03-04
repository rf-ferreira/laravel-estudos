<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Upload Images</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row w-50">
            <h1>Upload Images</h1>
            <form action="{{ route('storeImage') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Image</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input class="form-control" type="text" name="description">
                </div>
                <button class="mt-2 btn btn-primary">Upload</button>
            </form>
        </div>
        <div class="row">
            @forelse($images as $image)
            <div class="image d-flex">
                <img style="height: 60px; margin-right: 10px" src="{{ asset('images/' . $image->name) }}" alt="{{ $image->description }}">
                <p>{{ $image->description }}</p>
            </div>
            @empty
                <p>No images found.</p>
            @endforelse
        </div>
    </div>
</body>
</html>