<div class="flex justify-center">
    <div class="w-full sm:w-4/5 md:w-1/2 lg:w-1/3">
        <form action="{{ route('login') }}" method="post" class="bg-app mt-5 p-6 shadow-md rounded-md">
            @csrf
            <h3 class="text-center text-title text-2xl font-semibold">Login</h3>
            <x-input_auth type="email" name="email" labelText="Email" />
            <x-input_auth type="password" name="password" labelText="Password" />

            <x-button type="submit"  message="Submit" />
            <div class="text-left mt-6">
                <a href="/register" class="text-link hover:underline">Register here</a>
            </div>
        </form>
    </div>
</div>
