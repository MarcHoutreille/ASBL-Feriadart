<style>
  .glide__slide {
    opacity: .8;
    transform: scale(0.9);
    transition: transform 0.1s ease;
  }

  .glide__slide--active {
    filter: none;
    opacity: 1;
    transform: scale(1);
    transition: all 0.1s ease-in-out;
  }
</style>

<!--- CAROUSEL --->
<div class="glide h-auto mt-40 mb-60">
  <h2 class="font-semibold text-3xl text-gray-800 leading-tight text-center my-10">
    {{ $event->name }}
  </h2>
  <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">
      @if ($pictures->count())
      @foreach ($pictures as $picture)
      <li class="glide__slide">
        <!-- HERE WE PUT OUR SLIDE -->
        <div class="flex align-center justify-center"><img class="max-h-96 rounded shadow-md cursor-pointer" src="{{ $picture->img_src}}?sig={{ $picture->id }}" alt="image" id="{{ $picture->id }}"></div>
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
<!-- Inscription Modal -->
<div class="bg-black bg-opacity-50 absolute inset-0 h-screen justify-center hidden items-start" id="modal">
  <div class="bg-white w-2/3 py-2 px-3 rounded shadow-xl text-gray-800 mt-3">
    <div class="flex justify-end items-center">
      <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="closeBtn" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
      </svg>
    </div>
    <div class="w-full flex-col flex p-4">
      <img id="image" src="">
    </div>
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

<!-- Button Javascript -->
<script>
  window.addEventListener('DOMContentLoaded', () => {
    // Selects the modal element
    const modal = document.querySelector('#modal');
    // Show modal function
    const showModal = () => {
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }
    // Close modal function
    const closeModal = () => {
      modal.classList.remove('flex');
      modal.classList.add('hidden');
    }
    // Selects the button element
    const closeBtn = document.querySelector('#closeBtn');
    // When user clicks the X the modal is closed
    closeBtn.addEventListener('click', closeModal);
    // Adds an EventListener on each photo to show the modal with the picture in it when clicked
    const images = document.querySelectorAll('.max-h-96');
    images.forEach(el => el.addEventListener('click', event => {
      document.getElementById('image').src = event.target.currentSrc;
      showModal();
    }));
    // When user clicks outside modal it closes the modal
    window.onclick = function(event) {
      if (event.target == modal) {
        closeModal();
      }
    }
  });
</script>