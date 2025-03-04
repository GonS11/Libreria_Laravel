@extends('layouts.app')

@section('title', 'ALL BOOKS')

@section('content')
<div class="flex justify-between my-4">
    <a href="{{ route('book.create') }}" class="text-link bg-app px-4 py-2 rounded-md w-32">Add Book</a>
    <div class="flex space-x-4 border-b bg-app rounded-md">
        @foreach ($genres as $genre)
        <form action="{{ route('book.index') }}" method="get">
            <button type="submit" name="selectGenre" value="{{ $genre }}"
                class="px-4 py-2 text-gray-600 hover:text-black border-b-4 border-transparent
                {{ request('selectGenre') == $genre ? 'border-gray-800 font-bold' : '' }}">
                {{ $genre }}
            </button>
        </form>
        @endforeach
    </div>
</div>

@include('layouts._partials.search_bar')
@include('layouts._partials.all_books')

<div class="mt-4">
    {{ $books->links() }}
</div>
@endsection
