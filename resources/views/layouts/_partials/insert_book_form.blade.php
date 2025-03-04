<div class="container mx-auto h-screen mt-5">
    <div class="flex flex-col justify-center items-center gap-2">
        <div class="w-full max-w-lg bg-white blur-sm p-6 rounded-lg shadow-md">
            <form action="{{ route('book.store') }}" method="post">
                @csrf
                <x-input type="text" name="ISBN" labelText="ISBN" />
                <x-input type="text" name="title" labelText="Title" />
                <x-input type="text" name="author" labelText="Author" />
                {{--<x-input type="text" name="cover" labelText="Cover" /> NO lo incluyo por no saber subir foto--}}
                <x-input type="number" name="stock" labelText="Stock" />
                <x-input type="number" name="price" labelText="Price" />

                <x-button type="submit" bg="blue" message="Create Book" />
            </form>
        </div>
    </div>
</div>
