<x-guest-layout>
    
    <head>
      <style>
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
    
    
      <section class="mx-auto mt-10">
        <h2 class="text-4xl text-center font-bold mb-10">{{ __('Gallery') }}</h2>

        <div class="shadow-2xl mx-auto max-w-3xl">
          <!-- large image on slides -->
          <div class="mySlides hidden">
            <div class="image1 w-full object-cover rounded shadow-md"></div>
          </div>
          <div class="mySlides hidden">
            <div class="image2 w-full object-cover rounded shadow-md"></div>
          </div>
          <div class="mySlides hidden">
            <div class="image3 w-full object-cover rounded shadow-md"></div>
          </div>
          <div class="mySlides hidden">
            <div class="image4 w-full object-cover rounded shadow-md"></div>
          </div>
          <div class="mySlides hidden">
            <div class="image5 w-full object-cover rounded shadow-md"></div>
          </div>
    
         
          <div class="flex bg-gray-400 rounded shadow-md mx-auto p-4">
            
              <a class="mx-auto text-black hover:text-gray-800 cursor-pointer text-3xl underline" onclick="plusSlides(-1)">{{ __('Previous') }}</a>
              <a class="mx-auto text-black hover:text-gray-800 cursor-pointer text-3xl underline" onclick="plusSlides(1)">{{ __('Next') }}</a>
            
             </div>
        </div> 
        
   

      <div class="container mx-auto px-4"> 
        <section class="pt-8 w-auto px-4">
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
    
      </section>
      <script>
      
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
          // var captionText = document.getElementById("caption");
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