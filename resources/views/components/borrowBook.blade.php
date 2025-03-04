<div class="flex flex-col items-center bg-white shadow-md rounded-lg p-6 w-70 min-h-[500px] justify-between">
    <h3 class="text-lg font-semibold text-gray-800 text-center"><strong>Book ID:</strong>{{ $id }}</h3>
    <p class="text-gray-600 text-center"><strong>Customer ID:</strong> {{ $customerID }}</p>
    <p class="text-gray-600 text-center"><strong>Start:</strong> {{ $start }}</p>
    <p class="text-gray-600 text-center"><strong>End:</strong> {{ $end }}</p>

    <!-- Botones de acciones -->
    <div class="mt-4 flex gap-2">
        <form method="POST" action="{{ route('borrowBook.destroy', $id) }}">
            @csrf
            @method('delete')
            <x-button type="submit" bg="blue" message="Return"/>
        </form>
    </div>
</div>
