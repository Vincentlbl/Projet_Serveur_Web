<?php

namespace App\Models;

use App\Utils\Database;

class CarouselImage
{
    public static function getAllImages()
    {
        $pdo = Database::getPDO();
        $query = "SELECT * FROM carousel_images";
        $stmt = $pdo->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
