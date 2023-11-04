const swiper = new Swiper('.swiper__banner', {
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  // loop: true,
  autoplay: {
    delay: 3000,
  },
});

const swiperBrand = new Swiper('.swiper__brand', {
  loop: true,
  spaceBetween: 60,
  autoplay: {
    delay: 0,
    pauseOnMouseEnter: true, // added
    disableOnInteraction: false, // added
  },
  centeredSlides: true,
  autoplayDisableOnInteraction: true,
  speed: 5000,
  slidesPerView: 5,
});
