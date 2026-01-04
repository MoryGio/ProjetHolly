<?php
namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\User;

final class PanierController extends Controller
{
    public function add(): void
{
    // 1) On s’assure qu’une session existe (pour récupérer l’utilisateur connecté)
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // 2) On récupère l'ID du produit envoyé par le formulaire
    $productId = (int)($_POST['product_id'] ?? 0);
    if ($productId <= 0) {
        header('Location: /acceuil');
        exit;
    }

    // 3) On récupère l'utilisateur connecté
    // ⚠️ À adapter à TON système de login (on fixera juste après si besoin)
    $userId = $_SESSION['user_id'] ?? ($_SESSION['user']['id'] ?? 0);
    $userId = (int)$userId;

    if ($userId <= 0) {
        // Si pas connecté, on renvoie vers identification
        header('Location: /identification');
        exit;
    }

    // 4) Connexion DB
    $pdo = Database::getPDO();

    // 5) On ajoute au panier : si déjà existant → quantite + 1, sinon → insert
    $check = $pdo->prepare("SELECT id, quantite FROM panier WHERE user_id = ? AND product_id = ?");
    $check->execute([$userId, $productId]);
    $row = $check->fetch(\PDO::FETCH_ASSOC);

    if ($row) {
        $update = $pdo->prepare("UPDATE panier SET quantite = quantite + 1 WHERE id = ?");
        $update->execute([(int)$row['id']]);
    } else {
        $insert = $pdo->prepare("INSERT INTO panier (user_id, product_id, quantite) VALUES (?, ?, 1)");
        $insert->execute([$userId, $productId]);
    }

    // 6) Redirection vers le panier (GET)
    header('Location: /panier');
    exit;
}
}