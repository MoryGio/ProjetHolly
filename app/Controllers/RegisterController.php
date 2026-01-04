<?php
namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\User;

final class RegisterController extends Controller
{
    public function register(): void
    {
        // Ici on vérifie que la méthode HTTP est bien POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           // print_r($_POST); // Pour le debug, affiche les données reçues
            // Ici on créer une variable $email ou on stock la valeur de l'email
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            // Ici on pourrait ajouter la logique pour enregistrer l'utilisateur
            
            User::register($prenom, $email, $password);

            // Ici on démarre une session utilisateur avec les données de l'utilisateur
            $_SESSION['user'] = [
                'prenom' => $prenom,
                'email' => $email,
            ];
            //print_r($_SESSION); // Pour le debug, affiche la session utilisateur
            //print_r($_SESSION['user']); // Pour le debug, affiche la session utilisateur


        }
        $this->render('home/acceuil');
    }

    public function deconnexion(): void
    {
        // Détruit la session utilisateur : ca supprime le contenu de $_SESSION
        session_destroy();
        // Redirige vers la page d'accueil ou de connexion
        header('Location: /acceuil');
        exit();
    }
}
