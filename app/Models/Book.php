<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['ISBN', 'title', 'author', 'stock', 'price'];

    // A book can have many borrowed records
    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class);
    }
}
