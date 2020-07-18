@extends('layouts.app')

@section('content')
<div class="row">
    <div class="justify-content-center text-center">
        <div class="content">
            @foreach($books as $book)
                <div class="border rounded p-1 mt-2">
                    <h2 class="bg-dark rounded shadow text-white">{{ $book->title }}</h2>
                    <p class="border m-2 p-1">{{ $book->description }}</p>
                    <h6>BY: {{ $book->author }} - Released At:{{ $book->released_at }}</h6>
                    <h6>Price: {{ $book->price }}$</h6>
                    <h6>Category: <a href="{{ route('categories.show', $book->category->id) }}">{{ $book->category->title }}</a></h6>
                    @if (count($book->stores) > 0)
                        <h6>Stores:
                            @foreach($book->stores as $store)
                                <a href="{{ route('stores.show', $store->id) }}">{{ $store->name }}</a>
                            @endforeach 
                        </h6>
                    @endif
                    <a href="{{ route('books.show', $book->id) }}">Show</a> || <a href="{{ route('books.edit', $book->id ) }}">Edit</a> 
                </div>
                @endforeach
            <hr>
            {{-- <p>{{ $books->links() }}</p> --}}
            <div class="links">
                <a href="/">Home</a>
                <a href="/books">Books</a>
                <a href="/books/create">Create Book</a>
            </div>
        </div>
    </div>
</div>
@endsection
