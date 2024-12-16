<?php

$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

use App\Models\Product;

$productModel = new Product();
$product = $productModel->find($productId);

if ($product): ?>
  <main class="product-detail">
    <div class="product-container">
      <img src="<?= BASE_URL ?>/assets<?= htmlspecialchars($product['picture']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="product-image">
      <div class="product-info">
        <h2><?= htmlspecialchars($product['name']) ?></h2>
        <p class="product-description"><?= htmlspecialchars($product['description']) ?></p>
        <p class="product-price">Prix : <?= number_format($product['price'], 2) ?> €</p>

        <form action="<?= BASE_URL ?>cart" method="POST">
          <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
          <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['name']) ?>">
          <input type="hidden" name="product_price" value="<?= htmlspecialchars($product['price']) ?>">
          <input type="hidden" name="product_image" value="<?= htmlspecialchars($product['picture']) ?>">

          <label for="quantity">Quantité :</label>
          <input type="number" id="quantity" name="product_quantity" value="1" min="1">

          <button type="submit" class="add-to-cart">Ajouter au panier</button>
        </form>
      </div>
    </div>
  </main>
<?php else: ?>
  <main class="product-detail">
    <p>Produit non trouvé.</p>
  </main>
<?php endif; ?>
