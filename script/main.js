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
    header.classList.toggle('show', window.scrollY > 0);
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

let boxListCar = document.querySelectorAll('.box');
boxListCar.forEach((item) => {
    item.addEventListener('click', () => {
        switch (item.id) {
            case 'porsche':
                localStorage.setItem("list", "porsche");
                location.href = "listCar.html";
                break;
            case 'ferrari':
                localStorage.setItem("list", "ferrari");
                location.href = "listCar.html";
                break;
            case 'lamborghini':
                localStorage.setItem("list", "lamborghini");
                location.href = "listCar.html";
                break;
            case 'bentley':
                localStorage.setItem("list", "bentley");
                location.href = "listCar.html";
                break;
            case 'mercedes':
                localStorage.setItem("list", "mercedes");
                location.href = "listCar.html";
                break;
            case 'mclaren':
                localStorage.setItem("list", "mclaren");
                location.href = "listCar.html";
                break;
        }
    })
});



function clickPart() {
    let partList = document.querySelectorAll('.details');
    partList.forEach((item) => {
        item.addEventListener('click', () => {
            switch (item.id) {
                case 'tyres':
                    localStorage.setItem("part", "tyres");
                    location.href = "detailPart.html";
                    break;
                case 'piston':
                    localStorage.setItem("part", "piston");
                    location.href = "detailPart.html";
                    break;
                case 'gearbox':
                    localStorage.setItem("part", "gearbox");
                    location.href = "detailPart.html";
                    break;
                case 'spark-plugs':
                    localStorage.setItem("part", "spark-plugs");
                    location.href = "detailPart.html";
                    break;
                case 'disc-brake':
                    localStorage.setItem("part", "disc-brake");
                    location.href = "detailPart.html";
                    break;
                case 'suspension':
                    localStorage.setItem("part", "suspension");
                    location.href = "detailPart.html";
                    break;
            }
        });
    })
}

clickPart();

function clickNews() {
    let newsList = document.querySelectorAll('.news-btn');
    newsList.forEach((item) => {
        item.addEventListener('click', () => {
            switch (item.id) {
                case 'news1':
                    localStorage.setItem("news", "news1");
                    location.href = "news.html";
                    break;
                case 'news2':
                    localStorage.setItem("news", "news2");
                    location.href = "news.html";
                    break;
                case 'news3':
                    localStorage.setItem("news", "news3");
                    location.href = "news.html";
                    break;
            }
        });
    })
}

clickNews();




