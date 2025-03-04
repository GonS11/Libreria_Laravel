@extends('layouts.app')

@section('title', 'ALL BOOKS')

@section('content')
    <a href="{{ route('book.create') }}" class="text-blue-500 bg-gray-100 hover:bg-gray-300 px-4 py-2 rounded-md w-32">Add Book</a>
    @include('layouts._partials.search_bar')
    @include('layouts._partials.all_books')
    <div class="mt-4">
        {{-- Paginación --}}
        {{ $books->links() }}
    </div>
@endsection
