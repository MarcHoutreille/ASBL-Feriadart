<div class="relative w-full bg-gray-100 px-10 py-36 border-2 border-gray-200 border-opacity-60 rounded-lg">
    <a href="{{ route('gallery.show', $event) }}">
        <img alt="gallery" class="w-full h-full object-cover object-center block opacity-25 absolute inset-0 rounded-lg" src="{{ $event->img_src}}?sig={{ $event->id }}" alt="{{ $event->name }}">
    </a>
    <div class="text-center relative z-10 w-full">
        <h2 class="text-2xl text-purple-700 font-medium title-font mb-2">{{ $event->name }}</h2>
    </div>
</div>