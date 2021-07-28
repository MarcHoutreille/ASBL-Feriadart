<div class="bg-gray-100 max-h-screen flex flex-col items-center justify-center mt-4 pt-6 sm:pt-0 sm:rounded-t-lg">
    <div class="py-4">
        {{ $logo }}
    </div>

    <div class="bg-white w-full sm:max-w-md px-6 py-4 shadow-md overflow-hidden sm:rounded-b-lg">
        {{ $slot }}
    </div>
</div>