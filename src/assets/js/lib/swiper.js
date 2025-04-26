// Import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// Import styles bundle
import 'swiper/css/bundle';

document.addEventListener('DOMContentLoaded', function () {
  // Initialize Swiper only if necessary
  const smoothCarousels = document.querySelectorAll('.swiper.smooth-slide-carousel');
  const featuredCarousels = document.querySelectorAll('.swiper.featured-carousel');

  if (smoothCarousels.length) {
    smoothCarousels.forEach(container => initSmoothSwiper(container));
  }

  if (featuredCarousels.length) {
    featuredCarousels.forEach(container => initFeaturedSwiper(container));
  }

  // Initialize smooth slide carousel
  function initSmoothSwiper(container) {
    // Defer swiper initialization if needed for performance optimization
    import('swiper/bundle').then(({
      default: Swiper
    }) => {
      import('swiper/css/bundle').then(() => {
        const swiperWrapper = container.querySelector('.swiper-wrapper');
        const slides = Array.from(swiperWrapper.children);

        // Clone the slides dynamically to ensure only a few are added
        const cloneCount = window.innerWidth > 1024 ? 3 : 2; // Reduce clones on mobile
        for (let i = 0; i < cloneCount; i++) {
          slides.forEach(slide => {
            const clone = slide.cloneNode(true);
            swiperWrapper.appendChild(clone);
          });
        }

        // Initialize Swiper after cloning slides
        const swiper = new Swiper(container, {
          direction: 'horizontal',
          loop: true, // Enables looping
          speed: 4000, // Transition speed between slides
          autoplay: {
            delay: 0, // Set to 0 for continuous autoplay
            disableOnInteraction: false,
          },
          slidesPerView: 'auto',
          spaceBetween: 50,
          freeMode: true,
          freeModeMomentum: true, // Enable momentum for smooth, continuous movement
          loopAdditionalSlides: 2, // Keep fewer slides in memory for smooth looping
          observer: true,
          observeParents: true,
        });

        swiper.update(); // Ensure correct sizing
      });
    });
  }

// Initialize featured carousel with videos
function initFeaturedSwiper(container) {
  import('swiper/bundle').then(({
    default: Swiper
  }) => {
    import('swiper/css/bundle').then(() => {
      const slides = container.querySelectorAll('.swiper-slide');
      const singleSlideMode = slides.length === 1; // Check if there's only one slide

      const swiper = new Swiper(container, {
        direction: 'horizontal',
        loop: !singleSlideMode, // Enable looping only if multiple slides exist
        effect: 'fade',
        fadeEffect: {
          crossFade: true
        },
        speed: 1000,
        autoplay: singleSlideMode ?
          false // No autoplay for a single slide
          :
          {
            delay: 30000,
            disableOnInteraction: false,
          },
        slidesPerView: 1,
        on: {
          init: function () {
            const allVideos = container.querySelectorAll('video');
            allVideos.forEach((video) => video.pause()); // Pause all videos initially

            const firstVideo = slides[0].querySelector('video');
            if (firstVideo) {
              firstVideo.loop = true;
              firstVideo.play(); // Ensure video plays immediately
              firstVideo.addEventListener('ended', () => firstVideo.play()); // Restart on end (failsafe)
            }
          },
          slideChange: function () {
            if (singleSlideMode) return; // Skip this logic if only one slide exists

            // Pause all videos
            container.querySelectorAll('video').forEach((video) => video.pause());

            // Play the video in the active slide
            const activeVideo = container.querySelector('.swiper-slide-active video');
            if (activeVideo) activeVideo.play();

            // Adjust autoplay delay dynamically
            this.params.autoplay.delay = this.realIndex === 0 ? 20000 : 10000;
            this.autoplay.start();
          },
        },
      });

      swiper.update(); // Force recalculation

      // If there's only one slide, ensure video loops manually
      if (singleSlideMode) {
        const video = slides[0].querySelector('video');
        if (video) {
          video.loop = true;
          video.play();
          video.addEventListener('ended', () => video.play()); // Restart when it ends (failsafe)
        }
      }
    });
  });
}

  
  // Notifications
 // Count real slides
 const slideCount = document.querySelectorAll('.notice-carousel .swiper-slide').length;

 // Init only if there's at least 1 slide
 if (slideCount > 0) {
   const noticeSwiper = new Swiper(".notice-carousel", {
     loop: slideCount > 1, // Only enable loop if more than 1 slide
     effect: 'fade',
     fadeEffect: {
       crossFade: true
     },
     autoplay: {
       delay: 4000,
       disableOnInteraction: true
     },
     slidesPerView: 1,
     spaceBetween: 10,
     navigation: {
       nextEl: '.swiper-button-next',
       prevEl: '.swiper-button-prev'
     }
   });

   // Show/hide navigation arrows
   const nextBtn = document.querySelector('.swiper-button-next');
   const prevBtn = document.querySelector('.swiper-button-prev');

   if (slideCount <= 1) {
     nextBtn.style.display = 'none';
     prevBtn.style.display = 'none';
   } else {
     nextBtn.style.display = '';
     prevBtn.style.display = '';
   }
 }


});
