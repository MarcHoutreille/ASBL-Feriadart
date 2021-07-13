<style>
  .glide__slide {
    opacity: .8;
    transform: scale(0.9);
    transition: 0.1s ease;
  }

  .glide__slide--active {
    filter: none;
    opacity: 1;
    transform: scale(1);
  }
</style>

<!--- CAROUSEL --->
<div class="glide h-auto">
  <h2 class="font-semibold text-3xl text-gray-800 leading-tight text-center my-10">
    {{ $event->name }}
  </h2>
  <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">
      @if ($pictures->count())
      @foreach ($pictures as $picture)
      <li class="glide__slide">
        <!-- HERE WE PUT OUR SLIDE -->
        <div class="flex align-center justify-center"><img class="max-h-96 rounded shadow-md cursor-pointer" src="{{ $picture->img_src}}" alt="image" id="{{ $picture->id }}"></div>
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
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#FED12E">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
    </button>
    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
      <!-- NEXT SLIDE ARROW IMAGE -->
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#FED12E">
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
    perView: 3,
    focusAt: 'center',
    // NUMBER OF SLIDES
    breakpoints: {
      1400: {
        perView: 3
      },
      1200: {
        perView: 2
      },
      800: {
        perView: 1
      }
    }
  }).mount();
</script>