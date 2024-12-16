<main class="cart">
    <h2>Votre panier</h2>
    <?php if (!empty($cart)): ?>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="border-bottom: 2px solid #ddd; text-align: left;">
                    <th style="padding: 10px;">Image</th>
                    <th style="padding: 10px;">Nom</th>
                    <th style="padding: 10px;">Prix Unitaire</th>
                    <th style="padding: 10px;">Quantité</th>
                    <th style="padding: 10px;">Total</th>
                    <th style="padding: 10px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px; text-align: center;">
                            <img src="<?= BASE_URL . 'assets' . htmlspecialchars($item['image']) ?>" 
                                 alt="<?= htmlspecialchars($item['name']) ?>" 
                                 style="width: 75px; height: auto;">
                        </td>
                        <td style="padding: 10px;"><?= htmlspecialchars($item['name']) ?></td>
                        <td style="padding: 10px;"><?= number_format($item['price'], 2) ?>€</td>
                        <td style="padding: 10px;"><?= (int)$item['quantity'] ?></td>
                        <td style="padding: 10px;"><?= number_format($item['quantity'] * $item['price'], 2) ?>€</td>
                        <td style="padding: 10px;">
                            <!-- Formulaire pour supprimer un produit -->
                            <form action="<?= BASE_URL ?>cart?action=remove" method="POST">
                                <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                <button type="submit" style="padding: 5px 10px; background-color: #03362e; color: white; border: none; border-radius: 5px;">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p style="margin-top: 20px; font-size: 18px;">
            <strong>Total général :</strong> <?= isset($total) ? number_format($total, 2) . '€' : 'Total indisponible' ?>
        </p>
        <?php if (isset($promo) && $promo > 0): ?>
            <p>Réduction appliquée : <?= htmlspecialchars($promo) ?>%</p>
        <?php endif; ?>
        <div style="margin-top: 20px;">
            <!-- Champ code promo -->
            <form action="<?= BASE_URL ?>cart?action=applyPromo" method="POST" style="margin-bottom: 20px;">
                <label for="promo_code" style="font-size: 16px;">Code Promo :</label>
                <input type="text" id="promo_code" name="promo_code" placeholder="Entrez votre code promo" style="padding: 5px; width: 200px; margin-left: 10px;">
                <button type="submit" style="padding: 5px 15px; background-color: #03362e; color: white; border: none; border-radius: 5px;">
                    Appliquer
                </button>
            </form>
            <!-- Bouton pour valider le panier -->
            <form action="<?= BASE_URL ?>checkout" method="POST">
                <button type="submit" style="padding: 10px 20px; background-color: #03362e; color: white; border: none; border-radius: 5px; font-size: 16px;">
                    Valider le panier
                </button>
            </form>
        </div>
    <?php else: ?>
        <p>Votre panier est vide.</p>
    <?php endif; ?>
</main>
