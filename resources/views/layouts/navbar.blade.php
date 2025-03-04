<nav class="navbar shadow-md sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center py-4">
        <div class="flex items-center space-x-4">
            <a href="/" class="text-white text-2xl font-semibold flex items-center">
                <span class="fas fa-brain mr-2"></span>{{ config('app.name') }}
            </a>
            <button class="lg:hidden text-white" id="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            @auth()
                <x-link route="book.index" message="Books" />
                <x-link route="borrowBook.index" message="Borrow
                    Books" />
            @endauth
        </div>
        <div class="flex items-center space-x-4">
            @guest
                <x-link route="register" message="Register" />
                <x-link route="login" message="Login" />
            @endguest

            @auth()
                {{-- No usar Auth::user() que es el de por defecto, usar Auth::guard('customer')->user(). Cambiar el config/auth.php --}}
                <div class="flex justify-center items-center bg-gray-200 border border-black px-4 rounded-md">
                    <img class="w-8 h-8 rounded-full mr-2"
                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ Auth::guard('customer')->user()->firstname ?? 'default' }}"
                        alt="{{ Auth::guard('customer')->user()->firstname ?? 'User' }} Avatar">
                    <a href="#"
                        class="text-black px-4 py-2">{{ Auth::guard('customer')->user()->firstname ?? 'Guest' }}</a>
                </div>

                <x-link route="logout" message="Log out" />
            @endauth
        </div>
    </div>
</nav>
