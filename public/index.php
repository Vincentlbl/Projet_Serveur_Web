<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil</title>
  <link rel="stylesheet" href="/public/assets/css/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <?php require_once __DIR__ . '../src/views/partials/header.php'; ?>

  <main>
    <h1>Bienvenue sur notre site e-commerce</h1>

    <!-- Section Carrousel -->
    <section class="carousel">
      <div class="carousel-track" id="carousel">
        <img src="/public/assets/images/andrey-zvyagintsev-2HCVNKMZtVk-unsplash.jpg" alt="Produit 1"
          class="carousel-image">
        <img src="/public/assets/images/kevin-laminto-0ZPlUMo2lis-unsplash.jpg" alt="Produit 2"
          class="carousel-image">
        <img src="/public/assets/images/cesar-la-rosa-HbAddptme1Q-unsplash.jpg" alt="Produit 3" class="carousel-image">

        <img src="/public/assets/images/khaled-ghareeb-QN507MdnxRQ-unsplash.jpg" alt="Produit 4" class="carousel-image">

        <img src="/public/assets/images/kevin-laminto-07wBhL5WqgI-unsplash.jpg" alt="Produit 5" class="carousel-image">
      

      </div>



    </section>

    <script>
      const carousel = document.getElementById('carousel');
      let index = 0;

      function moveCarousel() {
        const images = document.querySelectorAll('.carousel-image');
        index++;
        if (index >= images.length) {
          index = 0;
        }
        const translateValue = -index * 100;
        carousel.style.transform = `translateX(${translateValue}%)`;
      }

      setInterval(moveCarousel, 3000);
    </script>
  </main>

  <?php require_once __DIR__ . '/'; ?>
</body>

</html>
