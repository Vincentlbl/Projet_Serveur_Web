<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\CarouselImage;

class MainController
{
    public function home()
    {
        $carouselImages = CarouselImage::getAllImages();
        $this->render('home', ['carouselImages' => $carouselImages]);
    }

    public function cart()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_GET['action']) && $_GET['action'] === 'remove') {
                $productId = $_POST['product_id'] ?? null;
                if ($productId) {
                    foreach ($_SESSION['cart'] as $index => $item) {
                        if ($item['id'] == $productId) {
                            unset($_SESSION['cart'][$index]);
                            $_SESSION['cart'] = array_values($_SESSION['cart']);
                            break;
                        }
                    }
                }
            } elseif (isset($_GET['action']) && $_GET['action'] === 'applyPromo') {
                $_SESSION['promo'] = 10; // Exemple : 10 % de réduction
            } else {
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

                    $found = false;
                    foreach ($_SESSION['cart'] as &$cartItem) {
                        if ($cartItem['id'] === $product['id']) {
                            $cartItem['quantity'] += $product['quantity'];
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) $_SESSION['cart'][] = $product;
                }
            }
        }

        $cart = $_SESSION['cart'];
        $promo = $_SESSION['promo'] ?? 0;
        $total = array_sum(array_map(fn($item) => $item['quantity'] * $item['price'], $cart));

        if ($promo > 0) $total -= $total * ($promo / 100);

        $this->render('cart', ['cart' => $cart, 'total' => $total, 'promo' => $promo]);
    }

    public function catalog()
    {
        $products = (new Product())->findAll();
        $this->render('catalog', ['products' => $products]);
    }

    public function login()
    {
        $this->render('login');
    }

    public function product()
    {
        $productId = $_GET['id'] ?? null;

        if (!$productId) {
            http_response_code(404);
            echo "Produit non trouvé.";
            return;
        }

        $product = (new Product())->find($productId);
        if (!$product) {
            http_response_code(404);
            echo "Produit non trouvé.";
            return;
        }

        $this->render('product', ['product' => $product]);
    }

    public function register()
    {
        $this->render('register');
    }

    public function productList()
    {
        $products = (new Product())->findAll();
        $this->render('product_list', ['products' => $products]);
    }

    public function testDatabase()
    {
        try {
            $pdo = \App\Utils\Database::getPDO();
            echo "Connexion à la BDD réussie.";
        } catch (\Exception $e) {
            echo "Erreur de connexion à la BDD : " . $e->getMessage();
        }
    }

    public function notFound()
    {
        http_response_code(404);
        echo "404 - Page Not Found!";
    }

    private function render($view, $data = [])
    {
        extract($data);

        $headerFile = __DIR__ . '/../views/partials/header.php';
        if (file_exists($headerFile)) require_once $headerFile;

        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "Vue introuvable : $view";
        }

        $footerFile = __DIR__ . '/../views/partials/footer.php';
        if (file_exists($footerFile)) require_once $footerFile;
    }
}
