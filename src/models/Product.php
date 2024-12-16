<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Product
{
    private $id;
    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $brand_id;
    private $category_id;
    private $type_id;
    private $created_at; 
    private $updated_at; 

    public function findAll()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query("SELECT * FROM product");
        $products = $stmt->fetchAll(PDO::FETCH_CLASS, 'App\Models\Product');  
        return $products;
    }
    

    
    

    public function find($id)
    {
        $pdo = Database::getPDO();
        $query = "SELECT * FROM product WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }


    public function fetchAll($sql)
    {
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
    }


    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getPicture()
    {
        return $this->picture;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getRate()
    {
        return $this->rate;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getBrandId()
    {
        return $this->brand_id;
    }
    public function getCategoryId()
    {
        return $this->category_id;
    }
    public function getTypeId()
    {
        return $this->type_id;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    } 
    public function getUpdatedAt()
    {
        return $this->updated_at;
    } 


    public function setName($name)
    {
        $this->name = $name;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setRate($rate)
    {
        $this->rate = $rate;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function setBrandId($brandId)
    {
        $this->brand_id = $brandId;
    }
    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;
    }
    public function setTypeId($typeId)
    {
        $this->type_id = $typeId;
    }
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    } 
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    } 
}
