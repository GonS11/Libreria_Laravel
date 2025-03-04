<div class=" bg-app min-h-screen h-fit flex flex-col md:flex-row ">

    <div class="w-full md:w-1/4 flex flex-col border-r-2 border-gray-200 bg-app p-6 shadow-lg">

        <div class="mb-8">
            <p class="text-xl font-bold text-gray-900 mb-4">📚 Top books of the month</p>
            <ul class="space-y-5">
                @foreach ($books as $book)
                    <li class="inline-block bg-option text-white px-6 py-2 rounded-lg transition duration-200 shadow-md">
                        <a href="{{route('book.show',$book->id)}}">{{$book->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <p class="text-xl font-bold text-gray-900 mb-4">👀 See your books</p>
            <a href="{{ route('book.index') }}"
                class="inline-block btn-primary text-white px-6 py-2 rounded-lg transition duration-200 shadow-md">
                Explore Books
            </a>
        </div>
    </div>

    <div class="w-full md:w-3/4 flex flex-col p-8 bg-app">
        <h1 class="text-4xl font-bold text-gray-900 mb-6">📖 ¡Welcome to your personal library!</h1>

        <p class="text-gray-700 mb-8 leading-relaxed">
            Discover a world of knowledge and adventure with our vast collection of books. Whether you're looking for
            the latest bestsellers, timeless classics, or hidden gems, we've got something for everyone. Dive into your
            next great read today!
        </p>

        <div class="relative rounded-lg overflow-hidden shadow-xl">
            <img src="{{ asset('assets/img/library.jpg') }}" alt="main-img-library" class="w-full h-120 object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">

            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('book.index') }}"
                class="inline-block btn-primary text-white px-8 py-3 rounded-lg transition duration-200 shadow-lg">
                Start Exploring Now
            </a>
        </div>
    </div>
</div>
