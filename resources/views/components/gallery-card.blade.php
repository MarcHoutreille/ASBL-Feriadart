<div class="flex flex-wrap w-96 bg-gray-100 py-36 px-10 relative m-4">
    <a href="{{ route('gallery.show', $event) }}">
        <img alt="gallery" class="w-full object-cover h-full object-center block opacity-25 absolute inset-0" src="{{ $event->img_src}}?sig={{ $event->id }}" alt="{{ $event->name }}">
    </a>
    <div class="text-center relative z-10 w-full">
        <h2 class="text-2xl text-gray-900 font-medium title-font mb-2">{{ $event->name }}</h2>
    </div>
</div>