@extends('layout')

@section('content')
    <div>
        <h3>
            <p>{{ $book['name'] }}</p>
        </h3>
        <p>Made by : {{ $book['author'] }}</p>
        <p>Released : {{ Carbon\Carbon::createFromTimestamp($book['release_date'])->toDateTimeString() }}</p>
        <p>ISBN : {{ $book['isbn'] }}</p>

        <a href="{{ route('books.edit', ['book' => $book['id']]) }}">
            <button>Edit book</button>
        </a>
        <form action="{{ route('books.destroy', ['book' => $book['id']]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete book</button>
        </form>
    </div>
@endsection