<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Cart;
use Mini\Models\Product;

final class CartController extends Controller
{
    public function index(): void
    {
        $this->render('home/cart', params: [
            
        ]);
    }


    /**
     * Affiche le panier d'un utilisateur
     */
    public function show(): void
    {
        $user_id = $_GET['user_id'] ?? 1; // Par défaut user_id = 1
        
        $cartItems = Cart::getCartByUserId($user_id);
        $total = Cart::calculateTotal($user_id);
        $user_id = $_GET['user_id'] ?? 1;
        
        $this->render('home/cart', [
            'title' => 'Mon panier',
            'cartItems' => $cartItems,
            'total' => $total,
            'user_id' => $user_id
        ]);
    }

    /**
     * Ajoute un produit au panier depuis un formulaire HTML
     */
    public function addFromForm(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /products');
            return;
        }
        
        $product_id = $_POST['product_id'] ?? null;
        $quantite = intval($_POST['quantite'] ?? 1);
        $user_id = $_POST['user_id'] ?? 1;
        
        if (!$product_id) {
            header('Location: /products');
            return;
        }
        
        // Vérifie que le produit existe et le stock
        $product = Product::findById($product_id);
        
        if (!$product) {
            header('Location: /produit?id=' . $product_id . '&error=product_not_found');
            exit;
        }
        
        $cart = new Cart();
        $cart->setUserId($user_id);
        $cart->setProductId($product_id);
        $cart->setQuantite($quantite);
        
        if ($cart->save()) {
            header('Location: /cart?user_id=' . $user_id . '&success=added');
        } else {
            header('Location: /products/show?id=' . $product_id . '&error=add_failed');
        }
    }

    /**
     * Met à jour la quantité d'un produit
     */
    public function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cart');
            return;
        }
        
        $cart_id = $_POST['cart_id'] ?? null;
        $quantite = intval($_POST['quantite'] ?? 1);
        
        if (!$cart_id) {
            header('Location: /cart?user_id=' . ($_GET['user_id'] ?? 1) . '&error=missing_fields');
            return;
        }
        
        // Récupère l'article et vérifie le stock
        $pdo = \Mini\Core\Database::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM panier WHERE id = ?");
        $stmt->execute([$cart_id]);
        $cartItem = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if (!$cartItem) {
            header('Location: /cart?user_id=' . ($_GET['user_id'] ?? 1) . '&error=item_not_found');
            return;
        }
        
        $product = Product::findById($cartItem['product_id']);
        if ($product['stock'] < $quantite) {
            header('Location: /cart?user_id=' . $cartItem['user_id'] . '&error=stock_insuffisant');
            return;
        }
        
        $cart = new Cart();
        $cart->setId($cart_id);
        $cart->setUserId($cartItem['user_id']);
        $cart->setProductId($cartItem['product_id']);
        $cart->setQuantite($quantite);
        
        if ($cart->save()) {
            header('Location: /cart?user_id=' . $cartItem['user_id'] . '&success=updated');
        } else {
            header('Location: /cart?user_id=' . $cartItem['user_id'] . '&error=update_failed');
        }
    }

    /**
     * Supprime un article du panier
     */
    public function remove(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cart');
            return;
        }
        
        $cart_id = $_POST['cart_id'] ?? null;
        
        if (!$cart_id) {
            header('Location: /cart?user_id=' . ($_GET['user_id'] ?? 1) . '&error=missing_cart_id');
            return;
        }
        
        // Récupère le user_id avant suppression
        $pdo = \Mini\Core\Database::getPDO();
        $stmt = $pdo->prepare("SELECT user_id FROM panier WHERE id = ?");
        $stmt->execute([$cart_id]);
        $cartItem = $stmt->fetch(\PDO::FETCH_ASSOC);
        $user_id = $cartItem['user_id'] ?? ($_GET['user_id'] ?? 1);
        
        $cart = new Cart();
        $cart->setId($cart_id);
        
        if ($cart->delete()) {
            header('Location: /cart?user_id=' . $user_id . '&success=removed');
        } else {
            header('Location: /cart?user_id=' . $user_id . '&error=delete_failed');
        }
    }

    /**
     * Vide le panier
     */
    public function clear(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cart');
            return;
        }
        
        $user_id = $_POST['user_id'] ?? $_GET['user_id'] ?? 1;
        
        if (Cart::clearByUserId($user_id)) {
            header('Location: /cart?user_id=' . $user_id . '&success=cleared');
        } else {
            header('Location: /cart?user_id=' . $user_id . '&error=clear_failed');
        }
    }



}