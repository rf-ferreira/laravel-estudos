<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Hardwares</title>
    <style>
        body {
            width: 70%;
            margin: 0 auto;
        }
        th[colspan="4"] {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container-fluid mt-2">
        <a href="{{ route('index') }}">Voltar</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="4">{{ $type->type }}</th>
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
                    <td>{{ $type->type }}</td>
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