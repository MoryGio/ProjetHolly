<?php

declare(strict_types=1);
namespace Mini\Controllers;
use Mini\Core\Controller;
use Mini\Models\User;
use Mini\Models\Product;

final class HomeController extends Controller
{
    public function index(): void
    {
        $this->render('home/index', params: [
            'title' => 'Mini MVC',
            'prenom' => 'Toto',
            'prenom2' => 'Tata',
        ]);
    }

    public function users(): void
    {
        $this->render('home/users', params: [
            'users' => $users = User::getAll(),
        ]);
    }

 public function acceuil(): void
{
    $products = Product::getAll();

    $this->render('home/acceuil', [
        'products' => $products,
    ]);
}

public function FicheProduit()
{
    if (!isset($_GET['id'])) {
        die("ID manquant.");
    }

    $id = (int) $_GET['id'];   

    $product = Product::findById($id);

    if (!$product) {
        die("Produit introuvable.");
    }

    $this->render('home/produits', [
        'product' => $product
    ]);
}

public function nosproduits(): void
    {
        $this->render('home/nosproduits', params: [
            'products' => $products = Product::getAll(),
         
        ]);
    }

public function histoire(): void
    {
        $this->render('home/histoire', params: [
        ]);
    }

public function ingredients(): void
    {
        $this->render('home/ingredients', params: [
        ]);
    }

public function contact(): void
    {
        $this->render('home/contact', params: [
        ]);
    }

public function identification(): void
    {
        $this->render('home/identification', params: [
        ]);
    }

public function inscription(): void
    {
        $this->render('home/inscription', params: [
        ]);
    }
    

public function panier(): void
    {
        $this->render('home/panier', params: [
        ]);
    }

}
