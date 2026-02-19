<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Cart;
use Mini\Models\Product;

final class CartController extends Controller
{
    /**
     * Récupère l'ID utilisateur depuis la session
     */
    private function getUserIdFromSession(): ?int
    {
        $id = $_SESSION['user_id'] ?? ($_SESSION['user']['id'] ?? null);
        $id = is_numeric($id) ? (int)$id : null;
        return ($id !== null && $id > 0) ? $id : null;
    }

    private function requireUserIdFromSession(): ?int
    {
        $userId = $this->getUserIdFromSession();
        if ($userId === null) {
            header('Location: /identification?error=auth_required');
            return null;
        }
        return $userId;
    }

    public function index(): void
    {
        $this->show();
    }


    /**
     * Affiche le panier lié à la session utilisateur
     */
    public function show(): void
    {
        $user_id = $this->getUserIdFromSession();

        if ($user_id === null) {
            $this->render('home/cart', [
                'title' => 'Mon panier',
                'cartItems' => [],
                'total' => 0,
                'user_id' => null
            ]);
            return;
        }

        $cartItems = Cart::getCartByUserId($user_id);
        $total = Cart::calculateTotal($user_id);
        
        $this->render('home/cart', [
            'title' => 'Mon panier',
            'cartItems' => $cartItems,
            'total' => $total,
            'user_id' => $user_id
        ]);
    }

    /**
     * Ajoute un produit au panier via la session
     */
    public function addFromForm(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /nosproduits');
            return;
        }
        
        $product_id = $_POST['product_id'] ?? null;
        $quantite = intval($_POST['quantite'] ?? 1);
        $user_id = $this->requireUserIdFromSession();
        if ($user_id === null) {
            return;
        }
        
        if (!$product_id) {
            header('Location: /nosproduits?error=missing_product_id');
            return;
        }
        
        $product = Product::findById($product_id);
        if (!$product) {
            die("Produit introuvable.");
        }
        
        $cart = new Cart();
        $cart->setUserId($user_id);
        $cart->setProductId($product_id);
        $cart->setQuantite($quantite);
        
        if ($cart->save()) {
            header('Location: /cart/show?success=added');
        } else {
            die("Erreur lors de l'enregistrement dans le panier.");
        }
    }

    /**
     * Met à jour la quantité
     */
    public function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cart/show');
            return;
        }
        
        $cart_id = $_POST['cart_id'] ?? null;
        $quantite = intval($_POST['quantite'] ?? 1);
        $user_id = $this->requireUserIdFromSession();
        if ($user_id === null) {
            return;
        }
        
        if (!$cart_id) {
            header('Location: /cart/show?error=missing_fields');
            return;
        }
        
        $pdo = \Mini\Core\Database::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM panier WHERE id = ? AND user_id = ?");
        $stmt->execute([$cart_id, $user_id]);
        $cartItem = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if (!$cartItem) {
            header('Location: /cart/show?error=item_not_found');
            return;
        }
        
        $stmt = $pdo->prepare("UPDATE panier SET quantite = ? WHERE id = ?");
        if ($stmt->execute([$quantite, $cart_id])) {
            header('Location: /cart/show?success=updated');
        } else {
            header('Location: /cart/show?error=update_failed');
        }
    }

    /**
     * Supprime un article
     */
    public function remove(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cart/show');
            return;
        }
        
        $cart_id = $_POST['cart_id'] ?? null;
        $user_id = $this->requireUserIdFromSession();
        if ($user_id === null) {
            return;
        }
        
        $pdo = \Mini\Core\Database::getPDO();
        $stmt = $pdo->prepare("SELECT id FROM panier WHERE id = ? AND user_id = ?");
        $stmt->execute([$cart_id, $user_id]);
        
        if ($stmt->fetch()) {
            $cart = new Cart();
            $cart->setId($cart_id);
            $cart->delete();
            header('Location: /cart/show?success=removed');
        } else {
            header('Location: /cart/show?error=not_authorized');
        }
    }

    /**
     * Vide le panier
     */
    public function clear(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cart/show');
            return;
        }
        
        $user_id = $this->requireUserIdFromSession();
        if ($user_id === null) {
            return;
        }
        Cart::clearByUserId($user_id);
        header('Location: /cart/show?success=cleared');
    }
}
