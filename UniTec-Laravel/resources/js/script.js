let time = 5000,
currentImageIndex = 1,
images = document.querySelectorAll("#slider img"),
max = images.length;

function nextImage(){

    images[currentImageIndex].classList.remove("selected")


    currentImageIndex++

    if(currentImageIndex >= max)
        currentImageIndex = 0

    images[currentImageIndex].classList.add("selected")
}

function start (){
    images[currentImageIndex].classList.add("selected")
    setInterval(() => {
    nextImage()
    }, time)
}

window.addEventListener("load", start)