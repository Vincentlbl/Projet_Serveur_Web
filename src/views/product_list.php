<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <form method="GET" action="">
                <div class="form-group">
                    <label for="sort">Trier par prix :</label>
                    <select name="sort" id="sort" class="form-control" onchange="this.form.submit()">
                        <option value="asc" <?= isset($_GET['sort']) && $_GET['sort'] == 'asc' ? 'selected' : '' ?>>Croissant</option>
                        <option value="desc" <?= isset($_GET['sort']) && $_GET['sort'] == 'desc' ? 'selected' : '' ?>>Décroissant</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <?php
        // Tri des produits en fonction du paramètre 'sort'
        if (isset($_GET['sort'])) {
            if ($_GET['sort'] == 'asc') {
                usort($products, function($a, $b) {
                    return $a->getPrice() - $b->getPrice();
                });
            } elseif ($_GET['sort'] == 'desc') {
                usort($products, function($a, $b) {
                    return $b->getPrice() - $a->getPrice();
                });
            }
        }

        foreach ($products as $product) : ?>
            <div class="col-md-4 mb-4">
                <div class="product">
                    <div class="product-image">
                        <a href="<?= BASE_URL ?>product?id=<?= $product->getId() ?>">
                            <img src="<?= BASE_URL ?>/assets<?= $product->getPicture() ?>" alt="<?= $product->getName() ?>" class="img-fluid">
                            <p class="product-description"><?= htmlspecialchars($product->getDescription()) ?></p> <!-- Affichage de la description -->

                        </a>
                    </div>
                    <div class="py-2">
                        <h3 class="h6 text-uppercase mb-1">
                            <?= $product->getName() ?>
                        </h3>
                        <span class="text-muted"><?= $product->getPrice() ?> €</span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
