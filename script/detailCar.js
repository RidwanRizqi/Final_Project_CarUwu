let detailsTitle = document.querySelectorAll('.details-title');
let detailsImg = document.querySelector('.details-img');
let detailsType = document.querySelector('.details-type');
let detailsEngine = document.querySelector('.details-engine');
let detailsCC = document.querySelector('.details-CC');
let detailsDesc = document.querySelector('.details-description');
let detailsExterior = document.querySelector('.details-exterior');
let detailsInterior = document.querySelector('.details-interior');

switch (localStorage.getItem('cars')) {
    case 'porsche1':
        setContentArray(0, 0);
        galleryCar("porsche", 0);
        break;
    case 'porsche2':
        setContentArray(0, 1);
        galleryCar("porsche", 0);
        break;
    case 'porsche3':
        setContentArray(0, 2);
        galleryCar("porsche", 0);
        break;
    case 'porsche4':
        setContentArray(0, 3);
        galleryCar("porsche", 0);
        break;
    case 'porsche5':
        setContentArray(0, 4);
        galleryCar("porsche", 0);
        break;
    case 'porsche6':
        setContentArray(0, 5);
        galleryCar("porsche", 0);
        break;
    case 'lamborghini1':
        setContentArray(1, 0);
        galleryCar("lamborghini", 1);
        break;
    case 'lamborghini2':
        setContentArray(1, 1);
        galleryCar("lamborghini", 1);
        break;
    case 'lamborghini3':
        setContentArray(1, 2);
        galleryCar("lamborghini", 1);
        break;
    case 'lamborghini4':
        setContentArray(1, 3);
        galleryCar("lamborghini", 1);
        break;
    case 'lamborghini5':
        setContentArray(1, 4);
        galleryCar("lamborghini", 1);
        break;
    case 'lamborghini6':
        setContentArray(1, 5);
        galleryCar("lamborghini", 1);
        break;
    case 'ferrari1':
        setContentArray(2, 0);
        galleryCar("ferrari", 2);
        break;
    case 'ferrari2':
        setContentArray(2, 1);
        galleryCar("ferrari", 2);
        break;
    case 'ferrari3':
        setContentArray(2, 2);
        galleryCar("ferrari", 2);
        break;
    case 'ferrari4':
        setContentArray(2, 3);
        galleryCar("ferrari", 2);
        break;
    case 'ferrari5':
        setContentArray(2, 4);
        galleryCar("ferrari", 2);
        break;
    case 'ferrari6':
        setContentArray(2, 5);
        galleryCar("ferrari", 2);
        break;
    case 'bentley1':
        setContentArray(3, 0);
        galleryCar("bentley", 3);
        break;
    case 'bentley2':
        setContentArray(3, 1);
        galleryCar("bentley", 3);
        break;
    case 'bentley3':
        setContentArray(3, 2);
        galleryCar("bentley", 3);
        break;
    case 'bentley4':
        setContentArray(3, 3);
        galleryCar("bentley", 3);
        break;
    case 'bentley5':
        setContentArray(3, 4);
        galleryCar("bentley", 3);
        break;
    case 'bentley6':
        setContentArray(3, 5);
        galleryCar("bentley", 3);
        break;
    case 'mercedes1':
        setContentArray(4, 0);
        galleryCar("mercedes", 4);
        break;
    case 'mercedes2':
        setContentArray(4, 1);
        galleryCar("mercedes", 4);
        break;
    case 'mercedes3':
        setContentArray(4, 2);
        galleryCar("mercedes", 4);
        break;
    case 'mercedes4':
        setContentArray(4, 3);
        galleryCar("mercedes", 4);
        break;
    case 'mercedes5':
        setContentArray(4, 4);
        galleryCar("mercedes", 4);
        break;
    case 'mercedes6':
        setContentArray(4, 5);
        galleryCar("mercedes", 4);
        break;
    case 'mclaren1':
        setContentArray(5, 0);
        galleryCar("mclaren", 5);
        break;
    case 'mclaren2':
        setContentArray(5, 1);
        galleryCar("mclaren", 5);
        break;
    case 'mclaren3':
        setContentArray(5, 2);
        galleryCar("mclaren", 5);
        break;
    case 'mclaren4':
        setContentArray(5, 3);
        galleryCar("mclaren", 5);
        break;
    case 'mclaren5':
        setContentArray(5, 4);
        galleryCar("mclaren", 5);
        break;
    case 'mclaren6':
        setContentArray(5, 5);
        galleryCar("mclaren", 5);
        break;
}

function setContentArray(idx1, idx2) {
    detailsTitle.forEach((item) => {
        item.innerHTML = carTitleArray[idx1][idx2];
    })
    detailsDesc.innerHTML = descriptionCar[idx1][idx2];
    detailsExterior.innerHTML = exterior[idx1][idx2];
    detailsInterior.innerHTML = interior[idx1][idx2];
    detailsType.innerHTML = carType[idx1][idx2];
    detailsEngine.innerHTML = carEngine[idx1][idx2];
    detailsCC.innerHTML = carCC[idx1][idx2];
    detailsImg.setAttribute('src', 'img/slideshow/' + brand[idx1] + (idx2 + 1) + '.jpg');
}

function galleryCar(brand, idx) {
    let i = 0;
    carImg.forEach((item) => {
        i++;
        item.setAttribute('src', 'img/' + brand + '/' +brand + i + '.jpg');
    })
    i = 0;
    carTitle.forEach((item) => {
        item.innerHTML = carTitleArray[idx][i];
        i++;
    })
    i = 0;
    boxCar.forEach((item) => {
        i++;
        item.setAttribute('id', brand + i);
    })
}

clickCar();
