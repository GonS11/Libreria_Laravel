<div class="flex justify-center">
    <div class="w-full sm:w-4/5 md:w-1/2 lg:w-1/3">
        <form action="{{ route('register') }}" method="post" class="bg-app mt-5 p-6 shadow-md rounded-md">
            @csrf
            <h3 class="text-center text-title text-2xl font-semibold">Register</h3>

            <x-input_auth type="text" name="firstname" labelText="Password" />
            <x-input_auth type="text" name="surname" labelText="Surname" />
            <x-input_auth type="email" name="email" labelText="Email" />
            <x-input_auth type="password" name="password" labelText="Password" />
            <x-input_auth type="password" name="password_confirmation" labelText="Confirm Password" />

            <div class="mt-6 flex gap-4">
                <label for="type" class="text-gray-900 font-semibold">Type</label>
                <input type="radio" name="type" id="type" value="basic"> Basic</input>
                <input type="radio" name="type" id="type" value="premium"> Premium</input>
                @error('type')
                    <span class="block text-sm text-red-500 mt-2">{{ $message }}</span>
                @enderror
            </div>

            <x-button type="submit" message="Submit" />

            <div class="text-left mt-6">
                <a href="/login" class="text-link hover:underline">Login here</a>
            </div>
        </form>
    </div>
</div>
