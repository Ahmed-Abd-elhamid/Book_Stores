@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
  	<button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
  </div>
@endif
@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@unless ( empty($success))
  <div class="alert alert-success alert-block">
  	<button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $success }}</strong>
  </div>
@endif
<div class="content">
    @foreach($books as $book)
        <div class="border rounded p-1 mt-2">
            <p>{{ $book->title }}</p>
            <p>{{ $book->description }}</p>
            <p>{{ $book->author }}</p>
            <p>{{ $book->released_at }}</p>
            <p>{{ $book->price }}</p>
            <a href="{{ route('books.show', $book->id) }}">Show</a> || <a href="{{ route('books.edit', $book->id ) }}">Edit</a> 
        </div>
        @endforeach
    <hr>
    <div class="links">
        <a href="/">Home</a>
        <a href="/books">Books</a>
        <a href="/books/create">Create Book</a>
    </div>
</div>
@endsection