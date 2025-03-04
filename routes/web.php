<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedBookController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/**Middleware auth:customer: Este middleware garantiza que la ruta solo sea accesible para los usuarios que estén autenticados. En este caso, el middleware auth:customer verifica si el usuario está autenticado utilizando el guard customer (que has definido en config/auth.php).

    Si el usuario está autenticado, puede continuar con la ejecución de la lógica en el controlador (en este caso, cerrar sesión).
    Si el usuario no está autenticado, Laravel devolverá automáticamente una respuesta de 401 Unauthorized. */

Route::get('/', function () {
    return view('main');
})->name('main');


//Controlador rutas get
//Route::get('/books/{action?}/{object?}', [BookController::class, 'routeController']);

//===============================BOOKS===========================
Route::resource('/book', BookController::class);

/* // Mostrar todos los libros
Route::get('/book', [BookController::class, 'index'])->name('book.index');
// Formulario para crear un nuevo libro
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
// Guardar un nuevo libro
Route::post('/book', [BookController::class, 'store'])->name('book.store');
// Mostrar un libro específico
//Route::get('/book/{book}', [BookController::class, 'show'])->name('book.show');
// Formulario para editar un libro
Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
// Actualizar un libro
Route::put('/book/{book}', [BookController::class, 'update'])->name('book.update');
// Eliminar un libro
Route::delete('/book/{book}', [BookController::class, 'destroy'])->name('book.destroy'); */


//========================BORROW BOOKS===========================
//Prestar
Route::get('/borrowBook', [BorrowedBookController::class, 'index'])->name('borrowBook.index');

// Prestar un libro
Route::post('/borrowBook/{book}', [BorrowedBookController::class, 'store'])->name('borrowBook.store');

// Devolver un libro
Route::delete('/borrowBook/{book}', [BorrowedBookController::class, 'destroy'])->name('borrowBook.destroy');

//==============================AUTHENTICATE======================
//Register
//1. Form
Route::get('/register', [CustomerController::class, 'register'])->name('register');
//2.Manda Info
Route::post('/register', [CustomerController::class, 'store']);

//Login
//1. Form
Route::get('/login', [CustomerController::class, 'login'])->name('login');
//2.Manda Info
Route::post('/login', [CustomerController::class, 'authenticate']);

//Logout
Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');
