<?php
require_once __DIR__ . '/../../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-commerce par Vincent</title>
  <!-- Utilisation de BASE_URL pour rendre le chemin vers le CSS dynamique -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/styles.css">
</head>

<body>
  
  <header>
    <h2><a href="<?= BASE_URL ?>" class="logo">E-commerce</a></h2>
    <nav>
      <ul class="mainMenu">
        <li><a href="<?= BASE_URL ?>">Accueil</a></li>
        <li><a href="<?= BASE_URL ?>catalog">Catalogue</a></li>
        <li><a href="<?= BASE_URL ?>login">Connexion</a></li>
        <li><a href="<?= BASE_URL ?>register">Inscription</a></li>
        <li><a href="<?= BASE_URL ?>cart">Panier</a></li>
      </ul>
    </nav>
  </header>

  <!-- Banderole de promotion -->
  <div class="promo-banner-content">
    Promo en cours ! Utilisez le code PROMO10 pour bénéficier de 10% de réduction ! 🎉
  </div>
</body>
</html>
