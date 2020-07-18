@extends('layouts.app')

@section('content')
<div class="row justify-content-center text-center content">
    @foreach($store->books as $book)
        <div class="col-3 border rounded p-1 m-2">
            <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none"><h4 class="bg-dark rounded shadow text-white p-2">{{ $book->title }}</h4></a>
            <p>
                @if (!is_null($book->image))
                    <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none"><img src="{{ url('storage/'.$book->image)}}" width="220" /></a>
                @else
                    <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none"><img src="{{ url('storage/noimg.svg')}}" width="220" /></a>
                @endif
            </p>
            <h6>BY: {{ $book->author }}</h6>
            <h6>Released At: {{ $book->released_at }}</h6>
            <h6>Price: {{ $book->price }}$</h6>
            <h6>Category: <a href="{{ route('categories.show', $book->category->id) }}">{{ $book->category->title }}</a></h6>
            @if (count($book->stores) > 0)
                <h6>Stores:
                    @foreach($book->stores as $store)
                        <a href="{{ route('stores.show', $store->id) }}"> {{ $store->name }}</a>
                    @endforeach 
                </h6>
            @endif
            <a href="{{ route('books.edit', $book->id ) }}" class="btn btn-sm btn-success mr-2">Edit</a>
            <form action="{{ route('books.destroy', $book->id )}}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
    @endforeach
</div>
<hr>
<div class="row justify-content-center text-center content">
    {{-- <div class="mt-3">{{ $books->links() }}</div> --}}
    <div class="links col-12">
        <a href="/">Home</a>
        <a href="/books">Books</a>
        <a href="/stores">Stores</a>
        <a href="/books/create">Create Book</a>
        <a href="/stores/create">Create Store</a>
    </div>
</div>
@endsection
