const carousel = document.getElementById('carousel');
let index = 0;

function moveCarousel() {
  index++;
  if (index > 2) index = 0; // Revenir au début après la dernière image
  carousel.style.transform = `translateX(-${index * 100}%)`;
}

setInterval(moveCarousel, 3000); // Défiler toutes les 3 secondes
