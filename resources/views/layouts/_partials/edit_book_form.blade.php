<div class="container mx-auto  mt-5">
    <div class="flex flex-col justify-center items-center gap-2">
        @include('layouts._partials.messages')
        <div class="w-full max-w-lg bg-white blur-sm p-6 rounded-lg shadow-md">
            <form action="{{ route('book.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-input type="text" name="ISBN" labelText="ISBN" value="{{$book->ISBN}}"/>
                <x-input type="text" name="title" labelText="Title" value="{{$book->title}}"/>
                <x-input type="text" name="author" labelText="Author" value="{{$book->author}}"/>
                <x-input type="number" name="stock" labelText="Stock" value="{{$book->stock}}"/>
                <x-input type="number" name="price" labelText="Price" value="{{$book->price}}"/>

                <x-button type="submit" bg="blue" message="Update Book" />
            </form>
        </div>
    </div>
</div>
