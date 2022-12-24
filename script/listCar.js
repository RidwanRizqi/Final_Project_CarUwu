let headingSpan = document.querySelector('.listcar-heading-h2');
let slideshowTitle = document.querySelectorAll('.slideshow-title');
let slideshowImg = document.querySelectorAll('.slideshow-img');
let carImg = document.querySelectorAll('.listcar-img');
let carTitle = document.querySelectorAll('.listcar-title');
let boxCar = document.querySelectorAll('.box');

if (localStorage.getItem('list') === "porsche") {
    headingSpan.innerHTML = brand[0];
    let i = 0;
    slideshowTitle.forEach((title) => {
        title.innerHTML = carTitleArray[0][i];
        carTitle[i].innerHTML = carTitleArray[0][i];
        i++;
        slideshowImg[i-1].setAttribute('src', 'img/slideshow/porsche' + i + '.jpg');
        carImg[i-1].setAttribute('src', 'img/porsche/porsche' + i + '.jpg');
        boxCar[i-1].setAttribute('id', 'porsche' + i);
    })
} else if (localStorage.getItem('list') === "lamborghini") {
    headingSpan.innerHTML = brand[1];
    let i = 0;
    slideshowTitle.forEach((title) => {
        title.innerHTML = carTitleArray[1][i];
        carTitle[i].innerHTML = carTitleArray[1][i];
        i++;
        slideshowImg[i-1].setAttribute('src', 'img/slideshow/lamborghini' + i + '.jpg');
        carImg[i-1].setAttribute('src', 'img/lamborghini/lamborghini' + i + '.jpg');
        boxCar[i-1].setAttribute('id', 'lamborghini' + i);
    })
} else if (localStorage.getItem('list') === "ferrari") {
    headingSpan.innerHTML = brand[2];
    let i = 0;
    slideshowTitle.forEach((title) => {
        title.innerHTML = carTitleArray[2][i];
        carTitle[i].innerHTML = carTitleArray[2][i];
        i++;
        slideshowImg[i-1].setAttribute('src', 'img/slideshow/ferrari' + i + '.jpg');
        carImg[i-1].setAttribute('src', 'img/ferrari/ferrari' + i + '.jpg');
        boxCar[i-1].setAttribute('id', 'ferrari' + i);
    })
} else if (localStorage.getItem('list') === "bentley") {
    headingSpan.innerHTML = brand[3];
    let i = 0;
    slideshowTitle.forEach((title) => {
        title.innerHTML = carTitleArray[3][i];
        carTitle[i].innerHTML = carTitleArray[3][i];
        i++;
        slideshowImg[i-1].setAttribute('src', 'img/slideshow/bentley' + i + '.jpg');
        carImg[i-1].setAttribute('src', 'img/bentley/bentley' + i + '.jpg');
        boxCar[i-1].setAttribute('id', 'bentley' + i);
    })
} else if (localStorage.getItem('list') === "mercedes") {
    headingSpan.innerHTML = brand[4];
    let i = 0;
    slideshowTitle.forEach((title) => {
        title.innerHTML = carTitleArray[4][i];
        carTitle[i].innerHTML = carTitleArray[4][i];
        i++;
        slideshowImg[i-1].setAttribute('src', 'img/slideshow/mercedes' + i + '.jpg');
        carImg[i-1].setAttribute('src', 'img/mercedes/mercedes' + i + '.jpg');
        boxCar[i-1].setAttribute('id', 'mercedes' + i);
    })
} else if (localStorage.getItem('list') === "mclaren") {
    headingSpan.innerHTML = brand[5];
    let i = 0;
    slideshowTitle.forEach((title) => {
        title.innerHTML = carTitleArray[5][i];
        carTitle[i].innerHTML = carTitleArray[5][i];
        i++;
        slideshowImg[i-1].setAttribute('src', 'img/slideshow/mclaren' + i + '.jpg');
        carImg[i-1].setAttribute('src', 'img/mclaren/mclaren' + i + '.jpg');
        boxCar[i-1].setAttribute('id', 'mclaren' + i);
    })
} else {
    headingSpan.innerHTML = "error";
}

function clickCar() {
    boxCar.forEach((item) => {
        item.addEventListener('click', () => {
            switch (item.id) {
                case "porsche1":
                    localStorage.setItem('cars', 'porsche1');
                    window.location.href = "detailCar.php";
                    break;
                case "porsche2":
                    localStorage.setItem('cars', 'porsche2');
                    window.location.href = "detailCar.php";
                    break;
                case "porsche3":
                    localStorage.setItem('cars', 'porsche3');
                    window.location.href = "detailCar.php";
                    break;
                case "porsche4":
                    localStorage.setItem('cars', 'porsche4');
                    window.location.href = "detailCar.php";
                    break;
                case "porsche5":
                    localStorage.setItem('cars', 'porsche5');
                    window.location.href = "detailCar.php";
                    break;
                case "porsche6":
                    localStorage.setItem('cars', 'porsche6');
                    window.location.href = "detailCar.php";
                    break;
                case "lamborghini1":
                    localStorage.setItem('cars', 'lamborghini1');
                    window.location.href = "detailCar.php";
                    break;
                case "lamborghini2":
                    localStorage.setItem('cars', 'lamborghini2');
                    window.location.href = "detailCar.php";
                    break;
                case "lamborghini3":
                    localStorage.setItem('cars', 'lamborghini3');
                    window.location.href = "detailCar.php";
                    break;
                case "lamborghini4":
                    localStorage.setItem('cars', 'lamborghini4');
                    window.location.href = "detailCar.php";
                    break;
                case "lamborghini5":
                    localStorage.setItem('cars', 'lamborghini5');
                    window.location.href = "detailCar.php";
                    break;
                case "lamborghini6":
                    localStorage.setItem('cars', 'lamborghini6');
                    window.location.href = "detailCar.php";
                    break;
                case "ferrari1":
                    localStorage.setItem('cars', 'ferrari1');
                    window.location.href = "detailCar.php";
                    break;
                case "ferrari2":
                    localStorage.setItem('cars', 'ferrari2');
                    window.location.href = "detailCar.php";
                    break;
                case "ferrari3":
                    localStorage.setItem('cars', 'ferrari3');
                    window.location.href = "detailCar.php";
                    break;
                case "ferrari4":
                    localStorage.setItem('cars', 'ferrari4');
                    window.location.href = "detailCar.php";
                    break;
                case "ferrari5":
                    localStorage.setItem('cars', 'ferrari5');
                    window.location.href = "detailCar.php";
                    break;
                case "ferrari6":
                    localStorage.setItem('cars', 'ferrari6');
                    window.location.href = "detailCar.php";
                    break;
                case "bentley1":
                    localStorage.setItem('cars', 'bentley1');
                    window.location.href = "detailCar.php";
                    break;
                case "bentley2":
                    localStorage.setItem('cars', 'bentley2');
                    window.location.href = "detailCar.php";
                    break;
                case "bentley3":
                    localStorage.setItem('cars', 'bentley3');
                    window.location.href = "detailCar.php";
                    break;
                case "bentley4":
                    localStorage.setItem('cars', 'bentley4');
                    window.location.href = "detailCar.php";
                    break;
                case "bentley5":
                    localStorage.setItem('cars', 'bentley5');
                    window.location.href = "detailCar.php";
                    break;
                case "bentley6":
                    localStorage.setItem('cars', 'bentley6');
                    window.location.href = "detailCar.php";
                    break;
                case "mercedes1":
                    localStorage.setItem('cars', 'mercedes1');
                    window.location.href = "detailCar.php";
                    break;
                case "mercedes2":
                    localStorage.setItem('cars', 'mercedes2');
                    window.location.href = "detailCar.php";
                    break;
                case "mercedes3":
                    localStorage.setItem('cars', 'mercedes3');
                    window.location.href = "detailCar.php";
                    break;
                case "mercedes4":
                    localStorage.setItem('cars', 'mercedes4');
                    window.location.href = "detailCar.php";
                    break;
                case "mercedes5":
                    localStorage.setItem('cars', 'mercedes5');
                    window.location.href = "detailCar.php";
                    break;
                case "mercedes6":
                    localStorage.setItem('cars', 'mercedes6');
                    window.location.href = "detailCar.php";
                    break;
                case "mclaren1":
                    localStorage.setItem('cars', 'mclaren1');
                    window.location.href = "detailCar.php";
                    break;
                case "mclaren2":
                    localStorage.setItem('cars', 'mclaren2');
                    window.location.href = "detailCar.php";
                    break;
                case "mclaren3":
                    localStorage.setItem('cars', 'mclaren3');
                    window.location.href = "detailCar.php";
                    break;
                case "mclaren4":
                    localStorage.setItem('cars', 'mclaren4');
                    window.location.href = "detailCar.php";
                    break;
                case "mclaren5":
                    localStorage.setItem('cars', 'mclaren5');
                    window.location.href = "detailCar.php";
                    break;
                case "mclaren6":
                    localStorage.setItem('cars', 'mclaren6');
                    window.location.href = "detailCar.php";
                    break;
            }
        })
    })
}

clickCar();


