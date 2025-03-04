<div class="mt-6">
    <label for="{{ $name }}" class="block text-sm font-semibold text-gray-900">{{ $labelText }}</label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
        class="mt-1 block w-full px-4 py-2 rounded-md border-gray-300 bg-input focus:outline-none focus:ring-2 focus:ring-blue-400"
        required>
        {{--La parte de error para el message no hace falta pasarla al componente, se comparte desde controlador--}}
    @error($name)
        <span class="block text-sm text-red-500 mt-2">{{ $message }}</span>
    @enderror
</div>
