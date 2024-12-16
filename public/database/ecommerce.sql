CREATE DATABASE ecommerce;
USE ecommerce;

-- Table users
-- Elle est presente comme le code login.php et register.php le montre mais pas finalisé.

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY (email(191))
);


-- Table product

CREATE TABLE product (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    picture VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- table cart

CREATE TABLE cart (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    product_id INT UNSIGNED NOT NULL,
    quantity INT UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES product(id)
);

-- Table carousel_images


CREATE TABLE carousel_images (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    image_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- Pour injecter mes données dans la base de données, j'ai utilisé les commandes suivantes :


-- Données de la table product
INSERT INTO product (name, description, picture, price) VALUES
('RTX 4070', 'Carte Graphique RTX 4070', '/assets/images/cg.jpg', 999.99),
('RX 7900 XTX', 'Carte Graphique RX 7900 XTX', '/assets/images/cg2.jpg', 999.99),
('RTX 4070 TI', 'Carte Graphique RTX 4070 TI', '/assets/images/cg3.jpg', 999.99),
('RTX 4080', 'Carte Graphique RTX 4080', '/assets/images/cg4.jpg', 1299.99),
('RX 7800 XT', 'Carte Graphique RX 7800 XT', '/assets/images/cg5.jpg', 1099.99),
('RTX 4060', 'Carte Graphique RTX 4060', '/assets/images/cg6.jpg', 699.99),
('RTX 4070 TI SUPER 16G', 'MSI GeForce RTX 4070 TI SUPER 16G GAMING X SLIM', '/assets/images/cg7.jpg', 1129.95),
('RTX 4070 TI SUPER EAGLE OC 16G', 'Gigabyte GeForce RTX 4070 Ti SUPER EAGLE OC 16G', '/assets/images/cg8.jpg', 1129.95),
('RX 7900 XTX Phantom Gaming 24GB', 'ASRock AMD Radeon RX 7900 XTX Phantom Gaming 24GB', '/assets/images/cg9.jpg', 999.95),
('RX 7900 XT Vapor-X 20GB', 'Sapphire NITRO+ AMD Radeon RX 7900 XT Vapor-X 20GB', '/assets/images/cg10.jpg', 879.95);

-- donnees de la table carousel_images

INSERT INTO carousel_images (image_path) VALUES
('/images/Promo.jpg'),
('/images/Promo2.jpg'),
('/images/Promo3.jpg'),
('/images/Promo4.jpg'),
('/images/Promo5.jpg');

