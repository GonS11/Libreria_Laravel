<div class="flex flex-col items-center bg-app shadow-md rounded-lg p-6 w-70 min-h-[500px] justify-between">
    <!-- Título del libro -->
    <h3 class="text-lg font-semibold text-gray-800 text-center">{{ $title }}</h3>

    <!-- Imagen del libro -->
    <img src="{{ asset($photo) }}" alt="Portada del libro" class="h-32 w-24 object-cover rounded-lg my-2">

    <!-- Información del libro -->
    <p class="text-gray-600 text-center"><strong>Autor:</strong> {{ $author }}</p>
    <p class="text-gray-600 text-center"><strong>Stock:</strong> {{ $stock }}</p>
    <p class="text-gray-600 text-center"><strong>Precio:</strong> {{ number_format($price, 2) }} €</p>

    <!-- Botones de acciones -->
    <div class="mt-4 flex gap-2">
        <form method="GET" action="{{ route('book.edit', $id) }}">
            @csrf
            <x-button type="submit" bg="green" message="Update"/>
        </form>

        <form method="POST" action="{{ route('book.destroy', $id) }}">
            @csrf
            @method('delete')
            <x-button type="submit" bg="red" message="Delete"/>
        </form>

        <form method="POST" action="{{ route('borrowBook.store', $id) }}">
            @csrf
            <x-button type="submit" bg="yellow" message="Rent"/>
        </form>
    </form>
    </div>
</div>
