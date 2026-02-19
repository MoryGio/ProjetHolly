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
            INNER JOIN products p ON c.id_produit = p.Id
            WHERE c.user_id = ?
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
            INNER JOIN products p ON c.id_produit = p.Id
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

    $this->user_id = (int)$this->user_id;
    $this->product_id = (int)$this->product_id;

    if ($this->user_id <= 0 || $this->product_id <= 0) {
        return false;
    }

    // sécurité: si quantite vide -> 1
    $this->quantite = (int)($this->quantite ?? 1);
    if ($this->quantite <= 0) $this->quantite = 1;

    // Vérifie si l'article existe déjà dans le panier pour cet utilisateur
    $sql = "SELECT id, quantite FROM panier WHERE user_id = ? AND id_produit = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$this->user_id, $this->product_id]);
    $existing = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existing) {
        $newQuantite = (int)$existing['quantite'] + $this->quantite;
        $stmt = $pdo->prepare("UPDATE panier SET quantite = ? WHERE id = ?");
        $ok = $stmt->execute([$newQuantite, $existing['id']]);

        if (!$ok) { return false; }
        return $ok;
    }

    // Ajoute un nouvel article
    $sql = "INSERT INTO panier (user_id, id_produit, quantite) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $ok = $stmt->execute([$this->user_id, $this->product_id, $this->quantite]);

    if (!$ok) { return false; }
    return $ok;
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

    /**
     * Vide le panier d'un utilisateur
     */
    public static function clearByUserId($user_id)
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("DELETE FROM panier WHERE user_id = ?");
        return $stmt->execute([$user_id]);
    }

    public function getAll()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}




  
