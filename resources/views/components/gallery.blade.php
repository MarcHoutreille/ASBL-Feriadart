
  <!--- CAROUSEL --->
  <div class="glide">
    <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
        {{ $event->name }}
    </h2>
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
            @if ($pictures->count())
            @foreach ($pictures as $picture)
            <li class="glide__slide">
              <!-- HERE WE PUT OUR SLIDE -->
              <div class="w-full object-cover rounded shadow-md"><img class="rounded shadow-md cursor-pointer h-96" src="{{ $picture->img_src}}" alt="image"  id="{{ $picture->id }}"></div>
              <!-- END OF SLIDE -->
            </li>
            @endforeach
            @else
            <p>{{ __('No pictures found')}}</p>
            @endif
        </ul>
    </div>
    <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
            <!-- PREVIOUS SLIDE ARROW IMAGE -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
            <!-- NEXT SLIDE ARROW IMAGE -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script>
    // https://glidejs.com
    new Glide(".glide", {
        type: "carousel",
        startAt: 0,
        perView: 3, // NUMBER OF SLIDES
    }).mount();
</script>
