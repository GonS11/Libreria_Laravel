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
        // Creamos una consulta en lugar de recuperar todos los registros directamente con all().
        // Esto nos permite construir la consulta de manera flexible y eficiente.
        $query = Book::query();

        // Verificamos si existe el parámetro de búsqueda en la petición (GET)
        // request()->has('searchValue') -> Comprueba si el parámetro existe en la URL.
        // request()->get('searchValue') !== '' -> Se asegura de que no esté vacío.
        if (request()->has('searchValue') && request()->get('searchValue') !== '') {
            // Aplicamos un filtro WHERE con LIKE para buscar títulos que contengan el término introducido.
            // '%' antes y después del término permite buscar coincidencias parciales.
            $query->where('title', 'like', '%' . request()->get('searchValue') . '%');
            $query->where('author', 'like', '%' . request()->get('searchValue') . '%');
        }

        // Obtenemos los resultados de la consulta y aplicamos paginación para evitar cargar demasiados registros de golpe.
        // paginate(10) significa que se mostrarán 10 resultados por página.
        $books = $query->paginate(4);

        // Retornamos la vista 'book.index' pasando la variable $books con los resultados filtrados y paginados.
        return view('book.index', ['books' => $books]);
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
