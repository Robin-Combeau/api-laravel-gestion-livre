@extends('layout')

@section('content')
    <div>
    @if (count($books)>0)
        @foreach ($books as $book)
            <div>
                <h3>
                    <a href ="{{ route('books.show', ['book' => $book['id']]) }}">{{ $book['name'] }}</a>
                </h3>
                <p>Made by : {{ $book['author'] }} </p>
                <p>Released : {{ Carbon\Carbon::createFromTimestamp($book['release_date'])->toDateTimeString() }}</p>
                <p>ISBN : {{ $book['isbn'] }} </p>
            </div>
        @endforeach
    @else
        <h3>There are no books to display.</h3>
    @endif
    </div>
@endsection