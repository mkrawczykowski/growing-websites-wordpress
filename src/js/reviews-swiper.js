import Swiper, { Navigation, Pagination } from 'swiper';

document.addEventListener('DOMContentLoaded', () => {
  Swiper.use([Navigation, Pagination]);
  const reviewsSwiper = new Swiper('.reviews-swiper', {
    speed: 400,
    spaceBetween: 20,
    slidesPerView: 'auto',
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    hashNavigation: {
      watchState: true,
    },
    breakpoints: {
      1600: {
        spaceBetween: 30,
      }
    }
  });
})
