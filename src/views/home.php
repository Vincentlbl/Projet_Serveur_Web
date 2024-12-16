<?php
require_once __DIR__ . '../../config/config.php'; // Inclure la configuration
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/styles.css"> <!-- Lien dynamique -->
    <title>E-commerce</title>
</head>

<body>

    <h1 class="Titre">Bienvenue sur notre site de E-commerce</h1>

    <section class="carousel">
        <div class="carousel-track" id="carousel">
            <?php foreach ($carouselImages as $image): ?>
                <img src="<?= rtrim(BASE_URL, '/') . '/' . ltrim(htmlspecialchars($image['image_path']), '/') ?>"
                    alt="<?= htmlspecialchars($image['title'] ?? 'Image du carrousel') ?>"
                    class="carousel-image">

            <?php endforeach; ?>
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

</body>

</html>