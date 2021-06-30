<footer class="text-gray-600 ">
    <div class="container h-72 mx-auto">
        
        <div class="block md:flex justify-evenly">
         
                <div class="text-center mt-4 md:my-auto md:ml-48">
                    <a href="{{ route('contact') }}" class="text-md text-gray-700 underline">
                        Contact
                    </a>
                    <div class="list-none mb-10 hidden" id="backnav">
                        @if (Route::has('login'))
                        @auth
                        <li>
                            <a href="{{ route('backoffice.index') }}" class="text-md text-gray-700 underline">Backoffice</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('login') }}" class="text-md text-gray-700 underline">Log in</a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="text-md text-gray-700 underline">Register</a>
                        </li>
                        @endif
                        @endauth
                        @endif
                    </div>
               
                </div>

              
                 <div class="my-4 md:my-auto md:mt-16">      
    
                <img class="mx-auto rounded-full h-40" src="/images/FeriaLogoBlack.png" alt="logo">
            
                </div>
           


            <div class="text-center md:my-auto">
                
                    <a href="https://www.facebook.com/FeriadArt/?ref=page_internal" class="inline-flex text-black">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-2" viewBox="0 0 24 24"> 
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"> </path>
                           </svg><span class="text-md text-gray-700 underline">Check out our Facebook page</span>
                    </a>
              
            </div>
            
                 
        </div>
          
        
    </div>


    <div class="bg-gray-100 h-14 flex justify-end">
        
            <div class="px-auto my-auto mr-2"><svg id="secret"
                width="20.000000pt" height="20.000000pt" viewBox="0 0 30.000000 30.000000"
                preserveAspectRatio="xMidYMid meet">
                <g transform="translate(0.000000,30.000000) scale(0.100000,-0.100000)"
                fill="#000000" stroke="none">
                <path d="M55 270 c-8 -12 23 -65 33 -56 3 4 0 12 -6 18 -7 7 -12 16 -12 22 0
                5 7 1 15 -10 8 -10 15 -14 15 -8 0 18 -37 47 -45 34z"/>
                <path d="M125 246 c-15 -14 -24 -30 -20 -36 4 -7 -2 -14 -14 -17 -12 -3 -21
                -12 -21 -19 0 -17 -11 -20 100 20 52 18 96 39 98 46 3 9 -3 11 -19 7 -14 -3
                -32 0 -43 9 -28 20 -51 17 -81 -10z"/>
                <path d="M165 176 c-75 -26 -85 -33 -85 -54 0 -9 -9 -28 -20 -42 -36 -46 -29
                -50 85 -50 88 0 105 2 105 15 0 9 -13 24 -30 33 -36 21 -37 24 -5 56 25 25 32
                51 18 59 -5 2 -35 -5 -68 -17z m5 -51 c-10 -12 -10 -21 -2 -40 11 -25 11 -25
                -34 -25 -40 0 -45 2 -39 18 4 9 9 24 12 33 3 9 19 21 36 26 38 12 44 9 27 -12z"/>
                </g>
                </svg>
            </div>
          
        
    </div>
</footer>


<script>

    

    const secretButton = document.querySelector('#secret');
    const backNav = document.querySelector('#backnav');

    function toggleSVG() {
            backNav.classList.toggle('hidden');
            backNav.classList.toggle('visible');
        }
    

   secretButton.addEventListener('click', toggleSVG);



</script>