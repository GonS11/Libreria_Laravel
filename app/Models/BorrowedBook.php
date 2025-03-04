<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'customer_id', 'start', 'end'];

    //===================Relaciones====================
    /**Ahora puedes hacer $borrowedBook->book->title o $borrowedBook->customer->firstname */
    public function book()
    {
        return $this->belongsTo(Book::class);
        //return $this->hasOne(Book::class); Para relacion 1 a 1
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
