window.onscroll = function () {
    const header = document.querySelector('header');
    const fixedNav = header.offsetTop;
    if (window.pageYOffset > fixedNav) {
        header.classList.add('navbar-fixed')
    } else {
        header.classList.remove('navbar-fixed')
    }
}

const hamburger = document.querySelector('#hamburger')
const navMenu = document.querySelector('#nav-menu');
hamburger.addEventListener('click', function () {
    hamburger.classList.toggle('hamburger-active')
    navMenu.classList.toggle('hidden')
})

let currentSlide = 0;
const slides = document.getElementById('slides');
const totalSlides = slides.children.length;

function updateSlide() {
    const offset = -currentSlide * 100;
    slides.style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateSlide();
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    updateSlide();
}