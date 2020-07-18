@extends('layouts.app')

@section('content')
<div class="content m-5 border p-1">
    <div>
        <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none"><h2 class="bg-dark rounded shadow text-white">{{ $book->title }}</h2></a>
        <p>
            @if (!is_null($book->image))
                <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none"><img src="{{ url('storage/'.$book->image)}}" width="500" /></a>
            @else
                <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none"><img src="{{ url('storage/noimg.svg')}}" width="500" /></a>
            @endif
        </p>
        <p class="border rounded p-2 mt-2 mb-2">{{ $book->description }}</p>
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
    <hr>
    <a href="/books"> <- Back -> </a>
</div>
@endsection