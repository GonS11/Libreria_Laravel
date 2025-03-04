<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasFactory, HasApiTokens; // Incluye HasApiTokens si usas autenticación API (opcional)

    protected $table = 'customers';

    protected $fillable = ['firstname', 'surname', 'email', 'password', 'type'];

    //Permite evitar que mostremos datos cuando serializamos/convertir un objeto en cadena
    protected $hidden = ['password', 'remember_token'];

    //En casts te viene bien para decir que tiene que venir una fecha en cierto formato y sino que intente hacer casting
    protected $casts = ['password' => 'hashed']; // Laravel 10 hace hashing automático de passwords

    // A customer can borrow many books
    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class);
    }
}
