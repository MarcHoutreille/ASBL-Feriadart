<x-guest-layout>
    {{-- <div class="container mx-auto px-4"> 
    <section class="pt-8 px-4">
        <div class="flex flex-wrap -mx-4">
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="/images/Feriadart0.png" alt=""></div>
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="/images/Feriadart0.png" alt=""></div>
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="/images/Feriadart0.png" alt=""></div>
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="/images/Feriadart0.png" alt=""></div>
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="/images/Feriadart0.png" alt=""></div>
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="/images/Feriadart0.png" alt=""></div>
        </div>
      </section>
    </div> --}}

    <head>
      <style>
      /*each image is referenced twice in the HTML, but each image only needs to be updated in the CSS*/
      .image1 {
        content: url("/images/Feriadart0.png")
      }
    
      .image2 {
        content: url("/images/Feriadart1.png")
      }
    
      .image3 {
        content: url("/images/Feriadart2.png")
      }
    
      .image4 {
        content: url("/images/Feriadart3.png")
      }
    
      .image5 {
        content: url("/images/Feriadart4.png")
      }
      </style>
    </head> 
    
    
      <section class="mx-auto max-w-2xl">
        <h2 class="text-4xl text-center tracking-wide font-extrabold font-serif leading-loose mb-2">Gallery</h2>
        <div class="shadow-2xl relative">
          <!-- large image on slides -->
          <div class="mySlides hidden">
            <div class="image1 w-full object-cover"></div>
          </div>
          <div class="mySlides hidden">
            <div class="image2 w-full object-cover"></div>
          </div>
          <div class="mySlides hidden">
            <div class="image3 w-full object-cover"></div>
          </div>
          <div class="mySlides hidden">
            <div class="image4 w-full object-cover"></div>
          </div>
          <div class="mySlides hidden">
            <div class="image5 w-full object-cover"></div>
          </div>
    
          <!-- butttons -->
       
    
          <!-- image description -->
          {{-- <div class="text-center text-white font-light tracking-wider bg-gray-800 py-2">
            <p id="caption"></p>
          </div> --}}
{{--  

          <a class="absolute left-0 inset-y-0 flex items-center -mt-32 px-4 text-white hover:text-gray-800 cursor-pointer text-3xl font-extrabold" onclick="plusSlides(-1)">❮</a>
          <a class="absolute right-0 inset-y-0 flex items-center -mt-32 px-4 text-white hover:text-gray-800 cursor-pointer text-3xl font-extrabold" onclick="plusSlides(1)">❯</a> --}}
{{--      --}}
          <!-- smaller images under description -->
          <div class="flex">
            <div>
              <img class="image1 description h-24 opacity-50 hover:opacity-100 cursor-pointer" src="#" onclick="currentSlide(1)">
            </div>
            <div>
              <img class="image2 description h-24 opacity-50 hover:opacity-100 cursor-pointer" src="#" onclick="currentSlide(2)" >
            </div>
            <div>
              <img class="image3 description h-24 opacity-50 hover:opacity-100 cursor-pointer" src="#" onclick="currentSlide(3)" >
            </div>
            <div>
              <img class="image4 description h-24 opacity-50 hover:opacity-100 cursor-pointer" src="#" onclick="currentSlide(4)">
            </div>
            <div>
              <img class="image5 description h-24 opacity-50 hover:opacity-100 cursor-pointer" src="#" onclick="currentSlide(5)">
            </div>
          </div>
        </div> 
        
      </section>

      <div class="container mx-auto px-4"> 
        <section class="pt-8 px-4">
            <div class="flex flex-wrap -mx-4">
              <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md cursor-pointer" src="/images/Feriadart0.png" onclick="currentSlide(1)" alt=""></div>
              <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md cursor-pointer" src="/images/Feriadart1.png" onclick="currentSlide(2)" alt=""></div>
              <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md cursor-pointer" src="/images/Feriadart2.png" onclick="currentSlide(3)" alt=""></div>
              <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md cursor-pointer" src="/images/Feriadart3.png" onclick="currentSlide(4)" alt=""></div>
              <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md cursor-pointer" src="/images/Feriadart4.png" onclick="currentSlide(5)" alt=""></div>
              <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md cursor-pointer" src="/images/Feriadart5.png" onclick="currentSlide(6)" alt=""></div>
            </div>
          </section>
        </div>
    
    
      <script>
        //JS to switch slides and replace text in bar//
        var slideIndex = 1;
        showSlides(slideIndex);
    
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
    
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
    
        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("description");
          var captionText = document.getElementById("caption");
          if (n > slides.length) {
            slideIndex = 1
          }
          if (n < 1) {
            slideIndex = slides.length
          }
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" opacity-100", "");
          }
          slides[slideIndex - 1].style.display = "block";
          dots[slideIndex - 1].className += " opacity-100";
          captionText.innerHTML = dots[slideIndex - 1].alt;
        }
      </script>
    

</x-guest-layout>