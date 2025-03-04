<div class="mx-auto py-2">
    <form action="{{ route('book.index') }}" method="GET">
        @csrf
        <input type="text" name="searchValue" id="searchValue" class="rounded-md" placeholder="Title or author" value="{{ request()->get('searchValue') }}">
        <button type="submit" class="rounded-md bg-gray-400 px-2 text-white">Search</button>
    </form>
</div>
