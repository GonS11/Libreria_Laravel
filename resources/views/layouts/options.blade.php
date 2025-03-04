<div class="container mt-4 mx-auto flex gap-4">
    <ul class="space-y-4">
        <x-optionLink route="book.create" message="Add Book"/>
        <x-optionLink route="book.index" message=""/>
        <x-optionLink route="" message=""/>
        <li><a href="{{ route('book.create') }}" class="text-blue-500 hover:bg-gray-100 px-4 py-2 rounded-md">Add Book</a>
        </li>
        <li><a href="{{ route('book.index') }}" class="text-blue-500 hover:bg-gray-100 px-4 py-2 rounded-md">Show All
                Books</a></li>
        <li><a href="{{ route('borrowBook.index') }}" class="text-blue-500 hover:bg-gray-100 px-4 py-2 rounded-md">Show
                All
                Borrowed Books</a></li>
    </ul>
</div>
