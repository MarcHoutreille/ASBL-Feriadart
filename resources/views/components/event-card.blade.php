<div class="border-2 border-gray-200 border-opacity-60 rounded-lg">
    <a href="{{ route('event.show', $event) }}" class="w-full inline-flex items-center md:mb-2 lg:mb-0">
        <img class="h-48 md:h-64 lg:h-72 w-full object-cover object-center rounded-t-md" src="{{ $event->img_src}}?sig={{ $event->id }}" alt="{{ $event->name }}">
    </a>
    <div class="p-4">
        <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">{{ \Carbon\Carbon::parse($event->date_start)->isoFormat('D/M/YYYY HH:mm') }} - {{ \Carbon\Carbon::parse($event->date_end)->isoFormat('D/M/YYYY HH:mm') }}</span>
        <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{ $event->name }}</h2>
        <!-- <p class="leading-relaxed mb-4">{!! $event->description !!}</p> -->
        <div class="flex items-center flex-wrap ">
            <a href="{{ route('event.show', $event) }}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">{{ __('Read more') }}
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                </svg>
            </a>
            <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pl-3 py-1 border-l-2 border-gray-200">
                <svg class="w-4 h-4 mr-1" stroke="none" stroke-width="2" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" viewBox="-76 1 511 511.99994">
                    <path d="m180.472656 512-10.835937-11.640625c-1.558594-1.671875-38.578125-41.605469-77.902344-98.132813-53.375-76.730468-83.5625-144.011718-89.71875-199.984374-1.019531-8.089844-1.515625-15.375-1.515625-22.269532 0-99.234375 80.738281-179.972656 179.976562-179.972656 99.207032 0 179.945313 80.722656 179.976563 179.941406 0 6.703125-.484375 13.894532-1.484375 21.980469-6.019531 55.992187-36.167969 123.339844-89.613281 200.171875-39.375 56.597656-76.484375 96.59375-78.042969 98.269531zm.003906-482.382812c-82.90625 0-150.359374 67.453124-150.359374 150.359374 0 5.671876.425781 11.78125 1.300781 18.671876l.027343.25c11.238282 102.730468 114.890626 229.714843 149.035157 269.085937 34.191406-39.398437 138.074219-166.585937 149.050781-269.339844l.03125-.25c.867188-7.007812 1.273438-12.871093 1.273438-18.449219-.027344-82.886718-67.480469-150.328124-150.359376-150.328124zm0 271.410156c-66.746093 0-121.050781-54.304688-121.050781-121.050782 0-66.746093 54.304688-121.050781 121.050781-121.050781 66.730469 0 121.019532 54.304688 121.019532 121.050781 0 66.746094-54.289063 121.050782-121.019532 121.050782zm0-212.480469c-50.414062 0-91.429687 41.015625-91.429687 91.429687 0 50.414063 41.015625 91.429688 91.429687 91.429688 50.398438 0 91.402344-41.015625 91.402344-91.429688 0-50.414062-41.003906-91.429687-91.402344-91.429687zm0 0" />
                </svg>{{ $event->place}}
            </span>
        </div>
    </div>
</div>