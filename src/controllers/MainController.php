<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\CarouselImage;

class MainController
{
    /**
     * Page d'accueil
     */
    public function home()
{
    // Charger les images du carrousel depuis la base de données
    $carouselImages = CarouselImage::getAllImages();

    // Rendre la vue avec les images du carrousel
    $this->render('home', [
        'carouselImages' => $carouselImages
    ]);
}

    /**
     * Gestion du panier
     */
    public function cart()
    {
        // Démarrer la session si ce n'est pas déjà fait
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // Initialiser le panier s'il n'existe pas
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    
        // Vérifier la méthode HTTP
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Si l'action est "remove", supprimer un produit
            if (isset($_GET['action']) && $_GET['action'] === 'remove') {
                $productId = $_POST['product_id'] ?? null;
                if ($productId) {
                    // Supprimer le produit du panier
                    foreach ($_SESSION['cart'] as $index => $item) {
                        if ($item['id'] == $productId) {
                            unset($_SESSION['cart'][$index]);
                            $_SESSION['cart'] = array_values($_SESSION['cart']); // Réindexer
                            break;
                        }
                    }
                }
            }
            // Si l'action est "applyPromo", appliquer un code promo
            elseif (isset($_GET['action']) && $_GET['action'] === 'applyPromo') {
                $promoCode = $_POST['promo_code'] ?? '';
                // Ajouter une logique de réduction ici si nécessaire
                $_SESSION['promo'] = 10; // Exemple : 10 % de réduction
            }
            // Sinon, ajouter un produit au panier
            else {
                if (
                    isset(
                        $_POST['product_id'],
                        $_POST['product_name'],
                        $_POST['product_price'],
                        $_POST['product_image'],
                        $_POST['product_quantity']
                    )
                ) {
                    $product = [
                        'id' => (int)$_POST['product_id'],
                        'name' => htmlspecialchars($_POST['product_name']),
                        'price' => (float)$_POST['product_price'],
                        'image' => htmlspecialchars($_POST['product_image']),
                        'quantity' => (int)$_POST['product_quantity'],
                    ];
    
                    // Ajouter ou mettre à jour la quantité du produit dans le panier
                    $found = false;
                    foreach ($_SESSION['cart'] as &$cartItem) {
                        if ($cartItem['id'] === $product['id']) {
                            $cartItem['quantity'] += $product['quantity'];
                            $found = true;
                            break;
                        }
                    }
    
                    if (!$found) {
                        $_SESSION['cart'][] = $product;
                    }
                }
            }
        }
    
        // Récupérer les informations pour la vue
        $cart = $_SESSION['cart'];
        $promo = $_SESSION['promo'] ?? 0;
    
        // Calculer le total général avec réduction
        $total = array_sum(array_map(function ($item) {
            return $item['quantity'] * $item['price'];
        }, $cart));
    
        if ($promo > 0) {
            $total = $total - ($total * ($promo / 100));
        }
    
        // Passer les données à la vue
        $this->render('cart', [
            'cart' => $cart,
            'total' => $total,
            'promo' => $promo
        ]);
    }
    /**
     * Page du catalogue
     */
    public function catalog()
    {
        // Récupération des produits via le modèle
        $productModel = new Product();
        $products = $productModel->findAll(); // Assurez-vous que cette méthode retourne un tableau d'objets produit
    
        // Passer les produits à la vue
        $this->render('catalog', [
            'products' => $products
        ]);
    }
    

    /**
     * Page de connexion
     */
    public function login()
    {
        $this->render('login');
    }

    /**
     * Page de détails d'un produit
     */
    public function product()
    {
        $productId = $_GET['id'] ?? null;

        if (!$productId) {
            http_response_code(404);
            echo "Produit non trouvé.";
            return;
        }

        $productModel = new Product();
        $product = $productModel->find($productId);

        if (!$product) {
            http_response_code(404);
            echo "Produit non trouvé.";
            return;
        }

        $this->render('product', ['product' => $product]);
    }

    /**
     * Page d'inscription
     */
    public function register()
    {
        $this->render('register');
    }

    /**
     * Page de liste des produits
     */
    public function productList()
    {
        // Récupération des produits via le modèle
        $productModel = new Product();
        $products = $productModel->findAll(); // Assurez-vous que cette méthode retourne des objets, pas des tableaux
    
        // Passer les produits à la vue
        $this->render('product_list', [
            'products' => $products
        ]);
    }
    

    /**
     * Test de connexion à la base de données
     */
    public function testDatabase()
    {
        try {
            $pdo = \App\Utils\Database::getPDO();
            echo "Connexion à la BDD réussie.";
        } catch (\Exception $e) {
            echo "Erreur de connexion à la BDD : " . $e->getMessage();
        }
    }

    /**
     * Page 404
     */
    public function notFound()
    {
        http_response_code(404);
        echo "404 - Page Not Found!";
    }

    /**
     * Méthode pour inclure une vue avec header et footer
     */
    private function render($view, $data = [])
    {
        extract($data);

        // Inclure le header
        $headerFile = __DIR__ . '/../views/partials/header.php';
        if (file_exists($headerFile)) {
            require_once $headerFile;
        }

        // Inclure la vue principale
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "Vue introuvable : $view";
        }

        // Inclure le footer
        $footerFile = __DIR__ . '/../views/partials/footer.php';
        if (file_exists($footerFile)) {
            require_once $footerFile;
        }
    }
}
