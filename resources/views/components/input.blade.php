<div class="mb-4">
    <label for="{{$name}}" class="block text-sm font-semibold text-gray-900">{{$labelText}}</label>
    <input type="{{$type}}" id="{{$name}}" name="{{$name}}" value="{{old($name ?? '', $value ?? '') }}"
        class="mt-1 block w-full px-4 py-2 rounded-md border-gray-300 bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-400"
        autocomplete="off"
        required>
</div>
