<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowedBook;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BorrowedBookController extends Controller
{
    public function index(): View
    {
        //Llamo a la varizable books pq es la variable que coge el documento que genera la tabla
        $books = BorrowedBook::all();
        return view('borrowBook.index', compact('books'));
    }

    public function store($id): RedirectResponse
    {
        //Recuperamos id de user y book
        $userId = Auth::guard('customer')->id();
        $book = Book::findOrFail($id);


        if ($book->stock <= 0) {
            return redirect()->route('main')->with('error', 'No stock available for this book');
        }

        // Verificar si el usuario ya tiene el libro prestado
        $exists = BorrowedBook::where('book_id', $id)
            ->where('customer_id', $userId)
            ->where('end', '>=', Carbon::today()) // Si aún no ha vencido
            ->exists();

        if ($exists) {
            return redirect()->route('main')->with('error', 'You already have this book borrowed.');
        }

        // Transacción para evitar inconsistencias
        //El use (...) en PHP pasa variables al closure (función anónima). En una transacción, lo usamos para que la función dentro de transaction() tenga acceso a $book y $userId.
        DB::transaction(function () use ($book, $userId) {
            // Reducir stock
            $book->decrement('stock');

            // Crear préstamo
            BorrowedBook::create([
                'book_id' => $book->id,
                'customer_id' => $userId,
                'start' => Carbon::today(),
                'end' => Carbon::today()->addMonth(),
            ]);
        });

        return redirect()->route('main')->with('success', 'Book borrowed successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $userId = Auth::guard('customer')->id();

        // Buscar el préstamo más reciente
        $borrowedBook = BorrowedBook::where('book_id', $id)
            ->where('customer_id', $userId)
            ->orderBy('start', 'desc')
            ->first();

        if (!$borrowedBook) {
            return redirect()->route('main')->with('error', 'You have not borrowed this book.');
        }

        // Transacción
        DB::transaction(function () use ($borrowedBook, $id) {
            $borrowedBook->delete();
            Book::where('id', $id)->increment('stock', 1);
        });

        return redirect()->route('main')->with('success', 'Book returned successfully.');
    }
}
