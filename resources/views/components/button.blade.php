<div class="mt-6">
    <button type="{{ $type ?? '' }}"
        class="w-full  text-{{ $color ?? 'white' }} px-4 py-2 rounded-md  transition duration-200 cursor-pointer
    @if (!empty($bg)) bg-{{ $bg }}-600 hover:bg-{{ $bg }}-800
    @else  btn-primary  @endif ">
        {{ $message }}
    </button>
</div>
