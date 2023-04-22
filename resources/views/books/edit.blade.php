@extends('layout')

@section('content')
<div class="max-w-7xl mx-auto p-6 lg:px-8">

    <form class ="form bg-white p-6 border-1" method ="POST" action= "{{ route('books.update', ['book' => $book->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Book Name</label>
            <input type="text" id="name" value="{{ $book->name }}" name="name">
            @error('name')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="author">Author</label>
            <input type="text" id="author" value="{{ $book->author }}" name="author">
            @error('author')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="release_date">Date</label>
            <input type="text" id="release_date" value="{{ $book->release_date }}" name="release_date">
            @error('release_date')
                    {{ $message }}
            @enderror
        </div>
        <div>
            <label for="isbn">Isbn</label>
            <input type="text" id="isbn" value="{{ $book->isbn }}" name="isbn">
            @error('isbn')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>

</div>
@endsection