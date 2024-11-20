const carousel = document.getElementById('carousel');
let index = 0;

function moveCarousel() {
  const images = document.querySelectorAll('#carousel img');
  index++;
  if (index >= images.length) {
    index = 0; 
  }
  carousel.style.transform = `translateX(-${index * 100}%)`;
}


setInterval(moveCarousel, 3000);
