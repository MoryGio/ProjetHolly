<!doctype html>
<!-- Définit la langue du document -->
<html lang="fr">
<!-- En-tête du document HTML -->
<head>
    <!-- Déclare l'encodage des caractères -->
    <meta charset="utf-8">
    <!-- Configure le viewport pour les appareils mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Définit le titre de la page avec échappement -->
    <title><?= isset($title) ? htmlspecialchars($title) : 'App' ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<!-- Corps du document -->
<body>
<!-- En-tête de la page -->
<header>
    <div class ="logoHoly">
    <img src="/Image/HOLY_Logo_1_280x.avif" alt="LogoHOLY">
    </div>
    <ul class="liens">
        <li><a href="/acceuil">Accueil</a></li>
        <li><a href="/nosproduits">Produits</a></li>
        <?php if (isset($_SESSION['user'])){ ?> 
        <li class='identification'><a href="/auth/deconnexion">Se déconnecter</a></li>  
        <?php } else { ?> 
        <li class='identification'><a href="/identification">S'identifier</a></li>  
        <?php } ?> 
        <li class='panier'>
            <a href="/cart">
                <img src="/Image/sac-de-courses.png" alt="Panier">
            </a>
        </li>

    <!-- Affiche le titre principal avec échappement -->
</header>
<!-- Zone de contenu principal -->
<main>
    <!-- Insère le contenu rendu de la vue -->
    <?= $content ?>
    
</main>
<!-- Fin du corps de la page -->
</body>
<!-- Fin du document HTML -->
</html>

