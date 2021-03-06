<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Relationships</title>
    <style>
        body {
            width: 70%;
            margin: 0 auto;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        th[colspan="4"] {
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="{{ route('insertHardware') }}" method="post">
        @csrf
        <h2>Insert new Hardware</h2>
        <label>Name</label>
        <input type="text" name="name">
        <label>Price</label>
        <input type="text" name="price">
        <label>Type</label>
        <select name="type">
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->type }}</option>
            @endforeach
        </select>
        <label>Brand</label>
        <select name="brand">
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
            @endforeach
        </select>
        <button class="btn btn-info mt-2 mb-2">Insert</button>
    </form>
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="4">Hardwares</th>
                </tr>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Price</th>
                <th scope="col">Type</th>
              </tr>
            </thead>
            <tbody>
                @forelse($hardwares as $hardware)
                <tr>
                    <td>{{ $hardware->name }}</td>
                    <td>{{ $hardware->hardwareBrand()->first()->brand }}</td>
                    <td>{{ $hardware->price }}</td>
                    <td><a href="{{ route('showHardware', $hardware->hardwareType()->first()->type) }}">{{ $hardware->hardwareType()->first()->type }}</a></td>
                </tr>      
                @empty
                <tr>
                    <td colspan="4">No hardware found...</td>
                </tr>
                @endforelse
            </tbody>
          </table>
    </div>
</body>
</html>