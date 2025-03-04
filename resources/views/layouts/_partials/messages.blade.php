@if (session()->has('success'))
    <!--Tambien con $message=Session::get('success')-->
    <div class="w-full mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md">
        <span>{{ session('success') }}</span>
    </div>
@endif


{{-- @if ($message = Session::get('success'))
    <div class="w-full mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md">
        <span>{{ $message }}</span>
    </div>
@endif --}}

{{--Errores se añade tambien $message=Session::get('danger') Ver de donde sale este danger--}}
@if ($errors->any())
    <div class="w-full mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
