<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<h1 class="text-3xl font-bold underline text-red-400">
    Hello world!
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button>submit</button>
    </form>
</h1>
</body>
</html>
