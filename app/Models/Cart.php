<?php

namespace Mini\Models;

use Mini\Core\Database;
use PDO;

class Cart
{
    private $id;
    private $user_id;
    private $product_id;
    private $quantite;
    private $created_at;
    private $updated_at;

    // Getters / Setters

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    public function getProductId()
    {
        return $this->product_id;
    }
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }
    public function getQuantite()
    {
        return $this->quantite;
    }
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    // Méthodes principales

     /**
     * Récupère tous les articles du panier d'un utilisateur
     */

    public static function getCartByUserId($user_id)
    {
        $pdo = Database::getPDO();

        $stmt = $pdo->prepare("
            SELECT 
                p.*, 
                c.quantite, 
                c.id AS panier_id
            FROM panier c
            INNER JOIN products p ON c.product_id = p.id
            WHERE c.user_id = ?
            ORDER BY c.created_at DESC
        ");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
    /**
     * Calcule le total du panier
     */

    public static function calculateTotal($user_id)
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("
            SELECT SUM(p.prix * c.quantite) as total
            FROM panier c
            INNER JOIN products p ON c.product_id = p.id
            WHERE c.user_id = ?
        ");
        $stmt->execute([$user_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0.00;
    }


    /**
     * Ajoute ou met à jour un produit dans le panier
     */

     public function save()
    {
        $pdo = Database::getPDO();
                
        if ($existing) {
            // Met à jour la quantité
            $stmt = $pdo->prepare("UPDATE panier SET quantite = ? WHERE user_id = ? AND product_id = ?");
            return $stmt->execute([$this->quantite, $this->user_id, $this->product_id]);
        } else {
            // Ajoute un nouvel article
            $stmt = $pdo->prepare("INSERT INTO panier (user_id, product_id, quantite) VALUES (?, ?, ?)");
            return $stmt->execute([$this->user_id, $this->product_id, $this->quantite]);
        }
    }

     /**
     * Supprime un article du panier
     */
    public function delete()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("DELETE FROM panier WHERE id = ?");
        return $stmt->execute([$this->id]);
    }

    public function getAll()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}




  