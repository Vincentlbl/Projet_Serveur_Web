<main>
    <h2>Catalogue des cartes graphiques</h2>

    <a href="<?= rtrim(BASE_URL, '/') ?>/products" class="btn btn-primary">Afficher tous les produits</a>

    <section class="product-grid">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <!-- Lien vers les détaillant les articles -->
                <a href="<?= rtrim(BASE_URL, '/') ?>/product?id=<?= $product->getId() ?>">
                    <img src="<?= rtrim(BASE_URL, '/') ?>/assets<?= $product->getPicture() ?>" alt="<?= htmlspecialchars($product->getName()) ?>">
                    <p><?= htmlspecialchars($product->getName()) ?> - <?= number_format($product->getPrice(), 2) ?>€</p>
                </a>
            </div>
        <?php endforeach; ?>
    </section>

    <!-- Bouton pour afficher tous les produits -->
    <a href="<?= rtrim(BASE_URL, '/') ?>/products" class="btn btn-primary">Afficher tous les produits</a>
</main>
