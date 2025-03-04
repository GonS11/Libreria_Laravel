<div class="overflow-x-auto bg-white shadow-md rounded-lg">
    @include('layouts._partials.messages')
    @if ($books->isNotEmpty())
     <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mx-auto">
            @foreach ($books as $book)
                <x-borrowBook id="{{$book->id}}" customerID="{{$book->customer_id}}" start="{{$book->start}}" end="{{$book->end}}"/>
            @endforeach
        </div>
    @else
        <p class="text-gray-600 text-center p-4">No books available.</p>
    @endif
</div>
