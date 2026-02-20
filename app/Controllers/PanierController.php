<?php
namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\User;

final class PanierController extends Controller
{
    public function add(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $productId = (int)($_POST['product_id'] ?? 0);
    if ($productId <= 0) {
        header('Location: /acceuil');
        exit;
    }

    $userId = $_SESSION['user_id'] ?? ($_SESSION['user']['id'] ?? 0);
    $userId = (int)$userId;

    if ($userId <= 0) {
        header('Location: /identification');
        exit;
    }

    $pdo = Database::getPDO();

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

    header('Location: /panier');
    exit;
}
}