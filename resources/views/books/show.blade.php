@extends('layouts.app')

@section('content')
<div class="content m-5 border p-1">
    <div>
        <p>{{ $book->title }}</p>
        <p>{{ $book->description }}</p>
        <p>{{ $book->author }}</p>
        <p>{{ $book->released_at }}</p>
        <p>{{ $book->price }}</p>
    </div>
    <hr>
    <a href="/books"> <- Back -> </a>
</div>
@endsection