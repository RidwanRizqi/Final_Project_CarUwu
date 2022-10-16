let search = document.querySelector('.search-box');
let searchIcon = document.querySelector('#search-icon');
searchIcon.onclick = () => {
    search.classList.toggle('active');
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.navbar');
let navbarIcon = document.querySelector('#menu-icon');
navbarIcon.onclick = () => {
    navbar.classList.toggle('active');
    search.classList.remove('active');
}

let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 4000);
}

let header = document.querySelector('header');

window.addEventListener('scroll', () => {
    header.classList.toggle('shadow', window.scrollY > 0);
});


const sections = document.querySelectorAll("section");
const navLi = document.querySelectorAll(".navbar-item");
window.onscroll = () => {
    search.classList.remove('active');
    navbar.classList.remove('active');
    var current = "";

    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        if (pageYOffset >= sectionTop - 60) {
            current = section.getAttribute("id");
        }
    });

    navLi.forEach((li) => {
        li.classList.remove("active");
        if (li.href.includes(current)) {
            li.classList.add('active');
        }
    });
};





