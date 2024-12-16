<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/crepe_waou-main/public/styles.css">
    <title>E-commerce</title>
</head>

<body>

 <h1 class="Titre"> Bienvenue sur notre site de E-commerce </h1>
 <style>
    .Titre {
        padding: 20px;
    }
 </style>

    <section class="carousel">
    <div class="carousel-track" id="carousel">
        <?php foreach ($carouselImages as $image): ?>
            <img src="<?= BASE_URL . htmlspecialchars($image['image_path']) ?>" 
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
    </main>

</body>

</html>
