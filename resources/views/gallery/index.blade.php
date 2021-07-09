<x-guest-layout>

  <section class="text-gray-600 body-font">
      <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-wrap -m-4">
              @foreach ($events as $event)
              <x-gallery-card :event="$event"   />
              @endforeach
          </div>
      </div>

    
    
 
</x-guest-layout>