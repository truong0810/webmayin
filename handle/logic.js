const mainBanner = document.querySelector('.main-banner');
const navbar = document.querySelector('.header-nav');

let navPos = navbar.getBoundingClientRect().top;
window.addEventListener('scroll', (e) => {
  let scrollPos = window.scrollY;
  if (scrollPos > navPos) {
    navbar.classList.add('sticky');
  } else {
    navbar.classList.remove('sticky');
  }
});
