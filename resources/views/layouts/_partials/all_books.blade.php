<div class="overflow-x-auto m-3">
    @include('layouts._partials.messages')

    @if ($books->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mx-auto">
            @foreach ($books as $book)
                <div class="bg-gray-200 flex flex-col">
                    <a href="{{ route('book.show', $book->id) }}">
                        <x-book id="{{ $book->id }}" title="{{ $book->title }}" photo="{{ $book->cover }}"
                            author="{{ $book->author }}" stock="{{ $book->stock }}" price="{{ $book->price }}" />
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600 text-center p-4">No books available</p>
    @endif
</div>
