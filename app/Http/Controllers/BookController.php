<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(): View
    {
        $query = Book::query();

        // Filtro de búsqueda por título, autor o género
        if (request()->has('searchValue') && request()->get('searchValue') !== '') {
            $searchValue = request()->get('searchValue');
            $query->where(function ($q) use ($searchValue) {
                $q->where('title', 'like', '%' . $searchValue . '%')
                    ->orWhere('author', 'like', '%' . $searchValue . '%')
                    ->orWhere('genre', 'like', '%' . $searchValue . '%');
            });
        }

        // Filtro por género si no se selecciona "All"
        if (request()->has('selectGenre') && request()->get('selectGenre') !== 'All') {
            $query->where('genre', request()->get('selectGenre'));
        }

        // Paginación de los resultados
        $books = $query->paginate(4);

        $genres = ['All', 'Fiction', 'Non-fiction', 'Mystery', 'Science Fiction', 'Fantasy', 'Romance', 'History', 'Biography', 'Horror', 'Children'];

        return view('book.index', compact('books', 'genres'));
    }


    public function bestBooks()
    {
        $books = Book::select('id', 'title')->orderByDesc('created_at')->limit(5)->get();

        return view('main', compact('books'));
    }


    public function store(BookRequest $request): RedirectResponse
    {
        //Dejo que la foto sea nullable pq hay por defecto
        Book::create($request->all());

        return redirect()->route('main')->with('success', 'Book added succesfully');
    }

    public function create(): View
    {
        //Muestra el form de new book
        return view('book.create');
    }

    public function show(Book $book): View
    {
        return view('book.show', compact('book'));
    }

    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        //$book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('main')->with('success', 'Book updated succesfully');
    }

    public function edit(Book $book): View
    {
        return view('book.edit', compact('book'));
    }

    /*     public function getBookInfo($id)
    {
        //muestra un libro especifico. Usar findOrFail() para lanzar un error 404 si el libro no se encuentra
        return Book::findOrFail($id);
    } */

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('main')->with('success', 'Book deleted succesfully');
    }
}
