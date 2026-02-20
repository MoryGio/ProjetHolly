<?php

declare(strict_types=1);
namespace Mini\Controllers;
use Mini\Core\Controller;
use Mini\Models\User;
use Mini\Models\Product;



final class ProductController extends Controller
{
    public function index(): void
    {
        $this->render('home/index', params: [

            'products' => Product::getAll()
        ]);
    }


       public function FicheProduit()
{
    if (!isset($_GET['id'])) {
        die("ID manquant.");
    }

    $id = (int) $_GET['id'];   // ✅ ICI on définit $id

    $product = Product::findById($id);

    if (!$product) {
        die("Produit introuvable.");
    }

    $this->render('home/produits', [
        'product' => $product
    ]);
}



}