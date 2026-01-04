<?php

// Active le mode strict pour la vérification des types
declare(strict_types=1);
// Déclare l'espace de noms pour ce contrôleur
namespace Mini\Controllers;
// Importe la classe de base Controller du noyau
use Mini\Core\Controller;
use Mini\Models\User;
use Mini\Models\Product;




// Déclare la classe finale HomeController qui hérite de Controller
final class HomeController extends Controller
{
    // Déclare la méthode d'action par défaut qui ne retourne rien
    public function index(): void
    {
        // Appelle le moteur de rendu avec la vue et ses paramètres
        $this->render('home/index', params: [
            // Définit le titre transmis à la vue
            'title' => 'Mini MVC',
            'prenom' => 'Toto',
            'prenom2' => 'Tata',
        ]);
    }

    public function users(): void
    {
        // Appelle le moteur de rendu avec la vue et ses paramètres
        $this->render('home/users', params: [
            // Définit le titre transmis à la vue
            'users' => $users = User::getAll(),
        ]);
    }

    public function Acceuil(): void
    {
        // Appelle le moteur de rendu avec la vue et ses paramètres
        $this->render('home/acceuil', params: [
            // Définit le titre transmis à la vue
            'products' => $products = Product::getAll(),
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

function nosproduits(): void
    {
        $this->render('home/nosproduits', params: [
            'products' => $products = Product::getAll(),
         
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
    

public function panier(): void
    {
        $this->render('home/panier', params: [
        ]);
    }

}

