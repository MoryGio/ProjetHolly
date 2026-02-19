<?php
namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\User;

final class RegisterController extends Controller
{
    /**
     * Gère l'inscription
     */
    public function register(): void
    {
        // Redirection si déjà connecté
        if (isset($_SESSION['user_id'])) {
            header('Location: /acceuil');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prenom = trim($_POST['prenom'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($prenom)) {
                header('Location: /inscription?error=prenom_requis');
                exit();
            }

            // Vérification email existant
            $existingUser = User::findByEmail($email);
            if ($existingUser) {
                header('Location: /inscription?error=email_deja_pris');
                exit();
            }

            User::register($prenom, $email, $password);

            $user = User::findByEmail($email);
            $_SESSION['user'] = $user;
            $_SESSION['user_id'] = $user['id'];

            header('Location: /acceuil?success=bienvenue');
            exit();
        }
        
        $this->render('home/inscription');
    }

    /**
     * Gère la connexion
     */
    public function login(): void
    {
        if (isset($_SESSION['user_id'])) {
            header('Location: /acceuil');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $user = User::findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                $_SESSION['user_id'] = $user['id'];
                
                header('Location: /acceuil');
                exit();
            } else {
                header('Location: /identification?login_error=1');
                exit();
            }
        }
        
        header('Location: /identification');
        exit();
    }

    /**
     * Gère la déconnexion
     */
    public function deconnexion(): void
    {
        session_destroy();
        header('Location: /acceuil');
        exit();
    }
}
