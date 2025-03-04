<div class="mx-auto py-2">
    <form action="{{ route('book.index') }}" method="GET">
        @csrf
        <input type="text" name="searchValue" id="searchValue" class="rounded-md p-2" placeholder="Title or author" value="{{ request()->get('searchValue') }}">
        <button type="submit" class="rounded-md navbar p-2 text-white">Search</button>
    </form>
</div>
