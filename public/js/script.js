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


document.addEventListener("DOMContentLoaded", function () {
    const dropdownButtonPusatStudi = document.getElementById("dropdownButtonPusatStudi");
    const dropdownMenuPusatStudi = document.getElementById("dropdownMenuPusatStudi");
    const dropdownButtonAksesCepat = document.getElementById("dropdownButtonAksesCepat");
    const dropdownMenuAksesCepat = document.getElementById("dropdownMenuAksesCepat");
    const dropdownButtonData = document.getElementById("dropdownButtonData");
    const dropdownMenuData = document.getElementById("dropdownMenuData");
    const dropdownButtonInformasi = document.getElementById("dropdownButtonInformasi");
    const dropdownMenuInformasi = document.getElementById("dropdownMenuInformasi");
    const dropdownButtonSumberDaya = document.getElementById("dropdownButtonSumberDaya");
    const dropdownMenuSumberDaya = document.getElementById("dropdownMenuSumberDaya");

    if (dropdownButtonPusatStudi) {
        dropdownButtonPusatStudi.addEventListener("click", function () {
            dropdownMenuPusatStudi.classList.toggle("hidden");
        });

        document.addEventListener("click", function (event) {
            if (!dropdownButtonPusatStudi.contains(event.target) && !dropdownMenuPusatStudi.contains(event.target)) {
                dropdownMenuPusatStudi.classList.add("hidden");
            }
        });
    }
    
    if (dropdownButtonAksesCepat) {
        dropdownButtonAksesCepat.addEventListener("click", function () {
            dropdownMenuAksesCepat.classList.toggle("hidden");
        });

        document.addEventListener("click", function (event) {
            if (!dropdownButtonAksesCepat.contains(event.target) &&dropdownButtonAksesCepat.contains(event.target)) {
                dropdownButtonAksesCepat.classList.add("hidden");
            }
        });
    }

    if (dropdownButtonData) {
        dropdownButtonData.addEventListener("click", function () {
            dropdownMenuData.classList.toggle("hidden");
        });

        document.addEventListener("click", function (event) {
            if (!dropdownButtonData.contains(event.target) && !dropdownMenuData.contains(event.target)) {
                dropdownMenuData.classList.add("hidden");
            }
        });
    }

    if (dropdownButtonInformasi) {
        dropdownButtonInformasi.addEventListener("click", function () {
            dropdownMenuInformasi.classList.toggle("hidden");
        });

        document.addEventListener("click", function (event) {
            if (!dropdownButtonInformasi.contains(event.target) && !dropdownMenuInformasi.contains(event.target)) {
                dropdownMenuInformasi.classList.add("hidden");
            }
        });
    }

    if (dropdownButtonSumberDaya) {
        dropdownButtonSumberDaya.addEventListener("click", function () {
            dropdownMenuSumberDaya.classList.toggle("hidden");
        });

        document.addEventListener("click", function (event) {
            if (!dropdownButtonSumberDaya.contains(event.target) && !dropdownMenuSumberDaya.contains(event.target)) {
                dropdownMenuSumberDaya.classList.add("hidden");
            }
        });
    } 
});


// slideshow

let currentSlide = 0;
const slides = document.getElementById("slides");
const indicators = document.querySelectorAll("#indicators div");

function showSlide(index) {
    const totalSlides = indicators.length;
    if (index >= totalSlides) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = totalSlides - 1;
    } else {
        currentSlide = index;
    }

    // Update transform untuk menggeser slide
    slides.style.transform = `translateX(-${currentSlide * 100}%)`;

    // Update indikator
    indicators.forEach((indicator, i) => {
        indicator.classList.toggle("active", i === currentSlide);
    });
}

// Automatic Slide
setInterval(() => {
    showSlide(currentSlide + 1);
}, 3000); // Ganti slide setiap 3 detik

// Show first slide
showSlide(currentSlide); 