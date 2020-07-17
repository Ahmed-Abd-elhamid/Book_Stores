@extends('layouts.app')

@section('content')
<div class="content border">
    <div class="m-5 p-2">
        <form action="{{ route('books.update', $book->id ) }}" method="post">
            @method('PUT')
            @csrf
            <label for="title">Title: </label><br>
            <input type="text" name="title" id="title" cols="15" value="{{ $book->title }}"><hr>
            <label for="descritpin">Description: </label><br>
            <textarea name="description" id="description" cols="15" rows="8">{{ $book->description }}</textarea><hr>
            <label for="auhtor">Author: </label><br>
            <input type="text" name="author" id="author" cols="15" value="{{ $book->author }}"><hr>
            <label for="released_at">Released at: </label><br>
            <input type="date" name="released_at" id="released_at" cols="15" value="{{ $book->released_at }}"><hr>
            <label for="price">Price: </label><br>
            <input type="number" name="price" id="price" cols="15" value="{{ $book->price }}"><hr>
            <label for="category">Category: </label><br>
            <select name="category" id="category">
                <option value="{{ $book->category->title }}" selected>{{ $book->category->title }}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <hr>
            <input type="submit" value="Edit">
        </form>
    </div>
    <hr>
    <a href="/books"> <- Back -> </a>
</div>
@endsection