<?php

namespace App\Models;

// Classe abstraite pour factoriser les propriétés communes
abstract class CoreModel
{
    protected $id;
    protected $created_at;
    protected $updated_at;

    // Getter et setter pour `id`
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter et setter pour `created_at`
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    // Getter et setter pour `updated_at`
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}
