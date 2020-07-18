<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        if ( !empty(request('q')) && !empty(request('search')) ){
            $books = [];
            if (request('search') == 'title') $books = Book::where('title', request('q'))->orderBy('created_at', 'desc')->paginate(9);
            if (request('search') == 'author') $books = Book::where('author', request('q'))->orderBy('created_at', 'desc')->paginate(9);
        }else{
            $books = Book::orderBy('created_at', 'desc')->paginate(9);
        }
        return view('books.index', ['books' => $books]);
    }

    public function show($id){
        $book = Book::find($id);
        return view('books.show', ['book' => $book]);
    }

    public function create(){
        $categories = Category::all();
        return view('books.create', ['categories' => $categories]);
    }

    public function store(){
        $cover = $this->generateImgName(request('cover'));

        $book = Book::create([
            'title' => request('title'),
            'description' => request('description'),
            'image' => $cover,
            'author' => request('author'),
            'released_at' => request('released_at'),
            'price' => request('price'),
            'category_id' => request('category')
        ]);
        return redirect()->route('books.show', $book->id)->with(['success' => 'created successfully!']);
    }

    public function edit($id){
        $book = Book::find($id);
        $categories = Category::all();
        return view('books.edit', ['book' => $book, 'categories' => $categories]);
    }

    public function update($id){
        Book::find($id)->update([
            'title' => request('title'),
            'description' => request('description'),
            'author' => request('author'),
            'released_at' => request('released_at'),
            'price' => request('price'),
            'category_id' => request('category')
        ]);
        return redirect()->route('books.index')->with('success', 'updated successfully!');
    }

    public function destroy($id){
        Storage::disk('public')->delete(Book::find($id)->image);
        Book::destroy($id);
        return redirect()->route('books.index')->with('success', 'deleted successfully!');
    }

    private function generateImgName(){
        $cover = request()->file('image');
        $rawName = $cover->getClientOriginalName();
        $fileExtension = $cover->getClientOriginalExtension();
        $fileName = pathinfo($rawName, PATHINFO_FILENAME);
        $generatedName = $fileName.'_'.time().'.'.$fileExtension;
        Storage::disk('public')->put($generatedName, File::get($cover));
        return $generatedName;
    }

    // public function search(){
    //     $books = [];
    //     if (request('search') == 'title') $books = Book::where('title', request('q'))->get();
    //     if (request('search') == 'author') $books = Book::where('author', request('q'))->get();
    //     return view('books.index', ['books' => $books]);
    // }
}
