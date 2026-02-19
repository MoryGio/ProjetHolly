<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title) ? htmlspecialchars($title) : 'HOLY - La révolution des soft drink !' ?></title>
    <link rel="stylesheet" href="/Css/style.css">
</head>
<body>

<header>
    <div class="logoHoly">
        <a href="/acceuil">
            <img src="/Image/HOLY_Logo_1_280x.png" alt="HOLY Logo">
        </a>
    </div>

    <ul class="liens">
        <li><a href="/nosproduits">Shop</a></li>
        <li><a href="/ingredients">Ingrédients</a></li>
        <li><a href="/notre-histoire">Notre Histoire</a></li>
    </ul>

    <div class="header-icons">
        <?php if (isset($_SESSION['user'])): ?> 
            <a href="/auth/deconnexion" title="Déconnexion">👋</a>
        <?php else: ?> 
            <a href="/identification" title="S'identifier">👤</a>
        <?php endif; ?> 
        
        <a href="/cart" class="panier">
            <img src="/Image/sac-de-courses.png" alt="Panier" style="width: 25px;">
        </a>
    </div>
</header>

<!-- Marquee -->
<div class="marquee">
    <div class="marquee__inner">
        <span>⚡ 0 SUCRE. 100% GOÛT.</span>
        <span>🔥 REJOINS LA TEAM</span>
        <span>✨ ARÔMES 100% NATURELS</span>
        <span>🚀 LIVRAISON EXPRESS</span>
        <span>⚡ 0 SUCRE. 100% GOÛT.</span>
        <span>🔥 REJOINS LA TEAM</span>
        <span>✨ ARÔMES 100% NATURELS</span>
        <span>🚀 LIVRAISON EXPRESS</span>
    </div>
</div>

<main>
    <?= $content ?>
</main>

<!-- Marquee Bas -->
<div class="marquee" style="background: var(--holy-yellow); color: black;">
    <div class="marquee__inner">
        <span>BYE BYE CANETTES</span>
        <span>HELLO HOLY</span>
        <span>BYE BYE CANETTES</span>
        <span>HELLO HOLY</span>
        <span>BYE BYE CANETTES</span>
        <span>HELLO HOLY</span>
        <span>BYE BYE CANETTES</span>
        <span>HELLO HOLY</span>
    </div>
</div>

<footer style="background: black; color: white; padding: 100px 5vw; text-align: center;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <img src="/Image/HOLY_Logo_1_280x.png" alt="HOLY Logo" style="width: 200px; filter: invert(1); margin-bottom: 40px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 60px; text-align: left; margin-bottom: 80px;">
            <div>
                <h4 style="color: white; margin-bottom: 20px;">SHOP</h4>
                <ul style="list-style: none; display: flex; flex-direction: column; gap: 10px; margin: 0;">
                    <li><a href="/nosproduits">Bestsellers</a></li>
                    <li><a href="/nosproduits?cat=energy">Energy</a></li>
                    <li><a href="/nosproduits?cat=icedtea">Iced Tea</a></li>
                </ul>
            </div>
        
        </div>
        <p style="font-family: 'Anton', sans-serif; font-size: 2rem; color: var(--holy-yellow);">LES SOFT DRINKS, EN MIEUX.</p>
        <p style="margin-top: 40px; font-size: 0.9rem; opacity: 0.4;">© <?= date('Y') ?> HOLY. Tous droits réservés.</p>
    </div>
</footer>

</body>
</html>
