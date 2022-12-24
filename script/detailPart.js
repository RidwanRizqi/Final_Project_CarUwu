let partTitle = document.querySelectorAll('.parts-title');
let partImg = document.querySelector('.parts-img');
let partPrice = document.querySelector('.parts-price');
let partType = document.querySelector('.parts-type');
let partDescription = document.querySelector('.parts-description');

switch (localStorage.getItem("part")) {
    case "tyres":
        partTitle[0].innerHTML = titlePart[0];
        partTitle[1].innerHTML = titlePart[0];
        partImg.src = "img/parts/tyres.png";
        partPrice.innerHTML = "<i class=\"fa-solid fa-dollar-sign\"></i> " + pricePart[0];
        partType.innerHTML = "<i class=\"fa-solid fa-receipt\"></i> " + typePart[0];
        partDescription.innerHTML = descriptionPart[0];
        break;
    case "piston":
        partTitle[0].innerHTML = titlePart[1];
        partTitle[1].innerHTML = titlePart[1];
        partImg.src = "img/parts/piston.png";
        partPrice.innerHTML = "<i class=\"fa-solid fa-dollar-sign\"></i> " + pricePart[1];
        partType.innerHTML = "<i class=\"fa-solid fa-receipt\"></i> " + typePart[1];
        partDescription.innerHTML = descriptionPart[1];
        break;
    case "gearbox":
        partTitle[0].innerHTML = titlePart[2];
        partTitle[1].innerHTML = titlePart[2];
        partImg.src = "img/parts/gearbox.png";
        partPrice.innerHTML = "<i class=\"fa-solid fa-dollar-sign\"></i> " + pricePart[2];
        partType.innerHTML = "<i class=\"fa-solid fa-receipt\"></i> " + typePart[2];
        partDescription.innerHTML = descriptionPart[2];
        break;
    case "spark-plugs":
        partTitle[0].innerHTML = titlePart[3];
        partTitle[1].innerHTML = titlePart[3];
        partImg.src = "img/parts/sparkplugs.png";
        partPrice.innerHTML = "<i class=\"fa-solid fa-dollar-sign\"></i> " + pricePart[3];
        partType.innerHTML = "<i class=\"fa-solid fa-receipt\"></i> " + typePart[3];
        partDescription.innerHTML = descriptionPart[3];
        break;
    case "disc-brake":
        partTitle[0].innerHTML = titlePart[4];
        partTitle[1].innerHTML = titlePart[4];
        partImg.src = "img/parts/disc-brake.png";
        partPrice.innerHTML = "<i class=\"fa-solid fa-dollar-sign\"></i> " + pricePart[4];
        partType.innerHTML = "<i class=\"fa-solid fa-receipt\"></i> " + typePart[4];
        partDescription.innerHTML = descriptionPart[4];
        break;
    case "suspension":
        partTitle[0].innerHTML = titlePart[5];
        partTitle[1].innerHTML = titlePart[5];
        partImg.src = "img/parts/suspension.png";
        partPrice.innerHTML = "<i class=\"fa-solid fa-dollar-sign\"></i> " + pricePart[5];
        partType.innerHTML = "<i class=\"fa-solid fa-receipt\"></i> " + typePart[5];
        partDescription.innerHTML = descriptionPart[5];
        break;
}

clickPart();