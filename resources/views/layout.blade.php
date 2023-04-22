<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ url('css/site.css')}}">
</head>
<body>

    <div>
        <nav>
            <a href="{{ route('index') }}">Home</a>
            <a href="{{ route('books.index') }}">Books</a>
            <a href="{{ route('books.create') }}">Create</a>
        </nav>
    </div>
    <br>


    @yield('content')


</body>
</html>