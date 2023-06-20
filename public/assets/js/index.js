 // JavaScript code to handle the carousel functionality
 const carouselImages = document.querySelectorAll('.carousel-image');
 const carouselIndicators = document.querySelectorAll('.carousel-indicators span');

 let currentIndex = 0;
 let interval;

 function startCarousel() {
     interval = setInterval(() => {
         carouselImages[currentIndex].classList.remove('active');
         carouselIndicators[currentIndex].classList.remove('active');

         currentIndex = (currentIndex + 1) % carouselImages.length;

         carouselImages[currentIndex].classList.add('active');
         carouselIndicators[currentIndex].classList.add('active');
     }, 2000); // Change slide every 2 seconds
 }

 function stopCarousel() {
     clearInterval(interval);
 }

 // Start the carousel on page load
 startCarousel();

 // Stop the carousel when the mouse is over the container
 const carouselContainer = document.querySelector('.carousel-container');
 carouselContainer.addEventListener('mouseenter', stopCarousel);

 // Restart the carousel when the mouse leaves the container
 carouselContainer.addEventListener('mouseleave', startCarousel);