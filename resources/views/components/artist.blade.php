<section class="container px-4 py-4 mx-auto text-gray-600 body-font overflow-hidden">
    <div class="-m-12 grid grid-cols-1 lg:grid-cols-2">
        <div class="p-12">
            <h1 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{ $artist->fname }} {{ $artist->lname }}</h1>
            <strong class="py-4">
                {!! $artist->bio !!}
            </strong>
            <div class="py-4">
                {!! $artist->products !!}
            </div>
            <!-- Links -->
            <div class="flex justify-center">
                @if($artist->url)
                <a href="{{ $artist->url }}" target="_blank" class="mr-5">
                    <div aria-label="Website" role="img">
                        <svg viewBox="0 -45 512 512" xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="5" fill="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m473.660156 119.761719h-27.273437c-32.304688-67.335938-97.382813-112.257813-171.304688-118.902344-1.625-.402344-3.304687-.535156-4.96875-.382813-4.675781-.3125-9.378906-.476562-14.113281-.476562-81.675781 0-155.328125 46.683594-190.390625 119.761719h-27.269531c-21.140625 0-38.339844 17.199219-38.339844 38.339843v106.089844c0 21.140625 17.199219 38.339844 38.339844 38.339844h27.265625c35.066406 73.046875 108.820312 119.757812 190.390625 119.757812 5.632812 0 11.21875-.226562 16.765625-.664062.101562-.007812.199219-.015625.300781-.023438 74.753906-6 140.722656-51.121093 173.324219-119.070312h27.273437c21.140625 0 38.339844-17.199219 38.339844-38.339844v-106.089844c0-21.140624-17.199219-38.339843-38.339844-38.339843zm-61.1875 0h-60.921875c-12.164062-33.964844-28.933593-62.085938-42.9375-82.011719 43.390625 13.125 80.644531 42.207031 103.859375 82.011719zm-171.46875 0h-48.335937c15.136719-37.355469 35.996093-66.273438 48.335937-81.519531zm29.988282-82.054688c12.335937 15.230469 33.28125 44.28125 48.476562 82.054688h-48.476562zm-67.195313-.078125c-14.058594 19.875-30.972656 48.050782-43.246094 82.132813h-61.03125c23.292969-39.933594 60.710938-69.070313 104.277344-82.132813zm-104.265625 264.902344h61.253906c12.308594 34.0625 29.191406 62.273438 43.191406 82.167969-43.617187-13.042969-81.121093-42.207031-104.445312-82.167969zm171.460938 0h48.136718c-15.121094 37.367188-35.859375 66.378906-48.136718 81.703125zm-29.988282 81.476562c-12.28125-15.265624-32.960937-44.117187-48.105468-81.476562h48.105468zm67.210938.648438c13.957031-19.914062 30.761718-48.105469 43.023437-82.125h61.234375c-23.285156 39.925781-60.695312 69.0625-104.257812 82.125zm173.796875-120.464844c0 4.601563-3.746094 8.347656-8.351563 8.347656h-435.320312c-4.605469 0-8.351563-3.746093-8.351563-8.347656v-106.089844c0-4.605468 3.746094-8.351562 8.351563-8.351562h435.320312c4.605469 0 8.351563 3.746094 8.351563 8.351562zm0 0" />
                            <path d="m180.480469 173.019531c-3.882813-2.132812-7.679688-3.207031-11.394531-3.207031-3.824219 0-6.1875 1.351562-7.085938 4.050781l-15.023438 42.871094-10.800781-36.285156c-1.011719-3.375-3.882812-5.066407-8.605469-5.066407-4.726562 0-7.597656 1.6875-8.609374 5.066407l-10.800782 36.285156-15.023437-42.871094c-.902344-2.699219-3.320313-4.050781-7.257813-4.050781-3.710937 0-7.507812 1.042969-11.390625 3.125-3.882812 2.082031-5.824219 4.53125-5.824219 7.339844 0 .902344.28125 2.085937.84375 3.546875l25.992188 64.976562c1.238281 3.039063 4.558594 4.554688 9.957031 4.554688 6.1875 0 9.84375-1.515625 10.972657-4.554688l11.136718-29.367187 11.140625 29.367187c1.121094 3.039063 4.726563 4.554688 10.800781 4.554688 5.511719 0 8.886719-1.515625 10.125-4.554688l25.992188-64.976562c.449219-.902344.675781-1.96875.675781-3.207031 0-2.925782-1.941406-5.457032-5.820312-7.597657zm0 0" />
                            <path d="m309.085938 173.019531c-3.882813-2.132812-7.679688-3.207031-11.394532-3.207031-3.824218 0-6.1875 1.351562-7.085937 4.050781l-15.023438 42.871094-10.800781-36.285156c-1.011719-3.375-3.882812-5.066407-8.609375-5.066407-4.722656 0-7.59375 1.6875-8.605469 5.066407l-10.800781 36.285156-15.019531-42.871094c-.902344-2.699219-3.320313-4.050781-7.257813-4.050781-3.714843 0-7.511719 1.042969-11.394531 3.125-3.878906 2.082031-5.820312 4.53125-5.820312 7.339844 0 .902344.277343 2.085937.84375 3.546875l25.988281 64.976562c1.238281 3.039063 4.558593 4.554688 9.957031 4.554688 6.1875 0 9.847656-1.515625 10.972656-4.554688l11.136719-29.367187 11.140625 29.367187c1.125 3.039063 4.726562 4.554688 10.800781 4.554688 5.511719 0 8.886719-1.515625 10.128907-4.554688l25.988281-64.976562c.449219-.902344.675781-1.96875.675781-3.207031 0-2.925782-1.9375-5.457032-5.820312-7.597657zm0 0" />
                            <path d="m437.691406 173.019531c-3.882812-2.132812-7.679687-3.207031-11.394531-3.207031-3.824219 0-6.1875 1.351562-7.085937 4.050781l-15.023438 42.871094-10.800781-36.285156c-1.011719-3.375-3.882813-5.066407-8.609375-5.066407-4.722656 0-7.59375 1.6875-8.605469 5.066407l-10.800781 36.285156-15.019532-42.871094c-.902343-2.699219-3.320312-4.050781-7.257812-4.050781-3.714844 0-7.511719 1.042969-11.394531 3.125-3.878907 2.082031-5.820313 4.53125-5.820313 7.339844 0 .902344.277344 2.085937.84375 3.546875l25.988282 64.976562c1.238281 3.039063 4.558593 4.554688 9.957031 4.554688 6.1875 0 9.847656-1.515625 10.972656-4.554688l11.136719-29.367187 11.140625 29.367187c1.125 3.039063 4.726562 4.554688 10.800781 4.554688 5.511719 0 8.886719-1.515625 10.128906-4.554688l25.988282-64.976562c.449218-.902344.675781-1.96875.675781-3.207031 0-2.925782-1.9375-5.457032-5.820313-7.597657zm0 0" />
                        </svg>
                    </div>
                </a>
                @endif
                @if($artist->facebook)
                <a href="{{ $artist->facebook }}" target="_blank" class="mr-5">
                    <div aria-label="Facebook" role="img">
                        <svg viewBox="-110 1 511 511.99996" xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="5" fill="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m180 512h-81.992188c-13.695312 0-24.835937-11.140625-24.835937-24.835938v-184.9375h-47.835937c-13.695313 0-24.835938-11.144531-24.835938-24.835937v-79.246094c0-13.695312 11.140625-24.835937 24.835938-24.835937h47.835937v-39.683594c0-39.347656 12.355469-72.824219 35.726563-96.804688 23.476562-24.089843 56.285156-36.820312 94.878906-36.820312l62.53125.101562c13.671875.023438 24.792968 11.164063 24.792968 24.835938v73.578125c0 13.695313-11.136718 24.835937-24.828124 24.835937l-42.101563.015626c-12.839844 0-16.109375 2.574218-16.808594 3.363281-1.152343 1.308593-2.523437 5.007812-2.523437 15.222656v31.351563h58.269531c4.386719 0 8.636719 1.082031 12.289063 3.121093 7.878906 4.402344 12.777343 12.726563 12.777343 21.722657l-.03125 79.246093c0 13.6875-11.140625 24.828125-24.835937 24.828125h-58.46875v184.941406c0 13.695313-11.144532 24.835938-24.839844 24.835938zm-76.8125-30.015625h71.632812v-193.195313c0-9.144531 7.441407-16.582031 16.582032-16.582031h66.726562l.027344-68.882812h-66.757812c-9.140626 0-16.578126-7.4375-16.578126-16.582031v-44.789063c0-11.726563 1.191407-25.0625 10.042969-35.085937 10.695313-12.117188 27.550781-13.515626 39.300781-13.515626l36.921876-.015624v-63.226563l-57.332032-.09375c-62.023437 0-100.566406 39.703125-100.566406 103.609375v53.117188c0 9.140624-7.4375 16.582031-16.578125 16.582031h-56.09375v68.882812h56.09375c9.140625 0 16.578125 7.4375 16.578125 16.582031zm163.0625-451.867187h.003906zm0 0" />
                        </svg>
                    </div>
                </a>
                @endif
                @if($artist->instagram)
                <a href="{{ $artist->instagram }}" target="_blank" class="mr-5">
                    <div aria-label="Instagram" role="img">
                        <svg viewBox="0 0 512.00096 512.00096" xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="5" fill="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m373.40625 0h-234.8125c-76.421875 0-138.59375 62.171875-138.59375 138.59375v234.816406c0 76.417969 62.171875 138.589844 138.59375 138.589844h234.816406c76.417969 0 138.589844-62.171875 138.589844-138.589844v-234.816406c0-76.421875-62.171875-138.59375-138.59375-138.59375zm108.578125 373.410156c0 59.867188-48.707031 108.574219-108.578125 108.574219h-234.8125c-59.871094 0-108.578125-48.707031-108.578125-108.574219v-234.816406c0-59.871094 48.707031-108.578125 108.578125-108.578125h234.816406c59.867188 0 108.574219 48.707031 108.574219 108.578125zm0 0" />
                            <path d="m256 116.003906c-77.195312 0-139.996094 62.800782-139.996094 139.996094s62.800782 139.996094 139.996094 139.996094 139.996094-62.800782 139.996094-139.996094-62.800782-139.996094-139.996094-139.996094zm0 249.976563c-60.640625 0-109.980469-49.335938-109.980469-109.980469 0-60.640625 49.339844-109.980469 109.980469-109.980469 60.644531 0 109.980469 49.339844 109.980469 109.980469 0 60.644531-49.335938 109.980469-109.980469 109.980469zm0 0" />
                            <path d="m399.34375 66.285156c-22.8125 0-41.367188 18.558594-41.367188 41.367188 0 22.8125 18.554688 41.371094 41.367188 41.371094s41.371094-18.558594 41.371094-41.371094-18.558594-41.367188-41.371094-41.367188zm0 52.71875c-6.257812 0-11.351562-5.09375-11.351562-11.351562 0-6.261719 5.09375-11.351563 11.351562-11.351563 6.261719 0 11.355469 5.089844 11.355469 11.351563 0 6.257812-5.09375 11.351562-11.355469 11.351562zm0 0" />
                        </svg>
                    </div>
                </a>
                @endif
            </div>
        </div>
        <div class="px-4 py-12">
            <!-- <img src="{{ $artist->img_01 }}" alt="{{ $artist->fname }} {{ $artist->lname }}" /> -->
            <div id="carousel" class="glide h-auto">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <li class="glide__slide">
                            <div class="flex align-center justify-center"><img class="max-h-96 rounded shadow-md cursor-pointer" src="{{ $artist->img_01}}?sig=1" alt="image" id="img_01"></div>
                        </li>
                        @if($artist->img_02)
                        <li class="glide__slide">
                            <div class="flex align-center justify-center"><img class="max-h-96 rounded shadow-md cursor-pointer" src="{{ $artist->img_02}}?sig=2" alt="image" id="img_02"></div>
                        </li>
                        @endif
                        @if($artist->img_03)
                        <li class="glide__slide">
                            <div class="flex align-center justify-center"><img class="max-h-96 rounded shadow-md cursor-pointer" src="{{ $artist->img_03}}?sig=3" alt="image" id="img_03"></div>
                        </li>
                        @endif
                        @if($artist->img_04)
                        <li class="glide__slide">
                            <div class="flex align-center justify-center"><img class="max-h-96 rounded shadow-md cursor-pointer" src="{{ $artist->img_04}}?sig=4" alt="image" id="img_04"></div>
                        </li>
                        @endif
                        @if($artist->img_05)
                        <li class="glide__slide">
                            <div class="flex align-center justify-center"><img class="max-h-96 rounded shadow-md cursor-pointer" src="{{ $artist->img_05}}?sig=5" alt="image" id="img_05"></div>
                        </li>
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
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script>
    // https://glidejs.com
    new Glide("#carousel", {
        type: "carousel",
        startAt: 0,
        perView: 1,
        focusAt: 'center',
        hoverpause: true,
    }).mount();
</script>