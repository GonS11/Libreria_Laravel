@extends('layouts.app')

@section('title', 'BOOK')

@section('content')
    @if (!empty($book))
        <x-book id="{{ $book->id }}" title="{{ $book->title }}" photo="{{ $book->cover }}"
            author="{{ $book->author }}" stock="{{ $book->stock }}" price="{{ $book->price }}" />
    @else
        <p>No book</p>
    @endif
@endsection
