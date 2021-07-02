<h3 class="text-center m-8 text-gray-500 font-bold text-xl underline">{{ __('Inscription') }}</h3>
<form class="w-full max-w-sm mx-auto" action="{{ route('inscriptions.store') }}" method="POST">
@csrf
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-first-name">
        👩‍🎨 {{ __('First Name ') }}
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200  border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="fname" id="inline-first-name" type="text" placeholder="John">
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-last-name">
        👩‍🎨 {{ __('Last Name') }}
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200  border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name"lname" id="inline-last-name" type="text" placeholder="Doe">
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-email">
        📧 {{ __('Email') }}
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200  border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="email" id="inline-email" type="text" placeholder="johndoe@mail.com">
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-telephone">
        📞 {{ __('Telephone') }}
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200  border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="telephone" id="inline-telephone" type="tel" placeholder="0123456789">
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="inline-block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-spaces">
        Amount of Spaces
      </label>
    </div>
    <select class="block  bg-gray-200 w-2/3  border border-gray-200 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
      <option>1 per person min.</option>
      <option>2</option>
      <option>3</option>
    </select>
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
      </svg>
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-days">
        📅 Day(s)
      </label>
    </div>
    <select class="block  bg-gray-200 w-2/3  border border-gray-200 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
      <option>Saturday</option>
      <option>Sunday</option>
      <option>Both</option>
    </select>
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
      </svg>
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3"></div>
    <label class="md:w-2/3 block text-gray-500 font-bold">
      <input class="mr-2 leading-tight" type="checkbox">
      <span class="text-sm">
        {{ __('Accept the Terms and Conditions') }}
      </span>
    </label>
  </div>
  <div class="md:flex md:items-center">
    <div class="md:w-1/3"></div>
    <div class="md:w-2/3">
      <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
        {{ __('Sign Up') }}
      </button>
    </div>
  </div>
</form>