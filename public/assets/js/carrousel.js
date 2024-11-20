const track = document.querySelector('.carousel-track');
const images = document.querySelectorAll('.carousel-image');

let currentIndex = 0;

function moveToNextImage() {
  currentIndex++;
  if (currentIndex >= images.length) {
    currentIndex = 0; // Revenir à la première image
  }
  const newTransform = `translateX(-${currentIndex * 100}%)`;
  track.style.transform = newTransform;
}

// Défilement automatique toutes les 3 secondes
setInterval(moveToNextImage, 3000);
