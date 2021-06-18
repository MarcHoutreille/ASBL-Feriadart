<header class="text-gray-700 underline">
    <div class="h-0 xs:h-30 md:h-60">
        <img class="invisible sm:visible" src="images/FeriaBijtels.png" alt="Feria D'art">
    </div>
    <nav class="relative bg-gray-400 md:text-lg md:h-18 p-3">
        <div class="justify-around sm:flex mx-4">
            <a href="{{ route('home') }}" class="hover:text-gray-900 sm:mx-1"><img class="m-auto rounded-full h-12" src="images/FeriaLogoWhite.png" alt="logo"></a>
            <a href="{{ route('home') }}" class="text-center block mt-2 hover:text-gray-900 ">Home</a>
            <a href="{{ route('events.index') }}" class="text-center block mt-2 hover:text-gray-900 ">Events</a>
            <a href="{{ route('gallery.index') }}" class="text-center block mt-2 hover:text-gray-900">Gallery</a>
            <a href="{{ route('articles.index') }}" class="text-center block mt-2 hover:text-gray-900">Articles</a>
            <a href="{{ route('about') }}" class="text-center block mt-2 hover:text-gray-900">About Us</a>
            <a href="{{ route('guestbook.index') }}" class="text-center block mt-2 hover:text-gray-900">Guestbook</a>
            <a href="{{ route('contact') }}" class="text-center block mt-2 hover:text-gray-900">Contact</a>
        </div>
    </nav>
</header>