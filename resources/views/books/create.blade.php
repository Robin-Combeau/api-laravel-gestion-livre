@extends('layout')

@section('content')
<div>

    <form method="POST" action= "{{ route('books.store') }}">
        @csrf
        <div>
            <label for="name">Book Name</label>
            <input type="text" id="name" value="{{ old('name') }}" name="name">
            @error('name')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="author">Author</label>
            <input type="text" id="author" value="{{ old('author') }}" name="author">
            @error('author')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="release_date">Date</label>
            <input type="text" id="release_date" value="{{ old('release_date') }}" name="release_date">
            @error('release_date')
                    {{ $message }}
            @enderror
        </div>
        <div>
            <label for="isbn">Isbn</label>
            <input type="text" id="isbn" value="{{ old('isbn') }}" name="isbn">
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