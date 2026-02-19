
<section class="hero">
    <div class="hero-bg-text">HOLY ENERGY</div>
    
    <div class="text-hero">
        <h1 style="color: var(--holy-black);">NE CHANGE RIEN.<br>SAUF TA BOISSON.</h1>
        <p style="font-size: 1.5rem; margin: 30px 0; max-width: 500px;">Ton futur désaltérant préféré : HOLY Softdrinks. Zéro sucre, 100% goût.</p>
        <a href="/nosproduits" class="btn">DÉCOUVRIR LA RÉVOLUTION</a>
    </div>

    <!-- Image flottante -->
    <img src="/Image/image_produits/HOLY_Energy.webp" class="floating-product" alt="HOLY Energy Box">
</section>

<section style="padding: 100px 5vw; background: var(--holy-pink); border-bottom: 3px solid black;">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center;">
        <div style="position: relative;">
            <img src="/Image/image_produits/HOLY_IcedTea.webp" style="width: 100%; border: 3px solid black; box-shadow: 25px 25px 0px black; transform: rotate(-3deg);">
            <div style="position: absolute; bottom: -30px; left: -30px; background: var(--holy-yellow); border: 3px solid black; padding: 20px; font-family: 'Anton'; font-size: 2rem; box-shadow: 5px 5px 0px black;">
                -30% DE RÉDUCTION
            </div>
        </div>
        <div>
            <h2 style="font-size: 5rem; line-height: 0.9; margin-bottom: 30px;">STARTER SET<br>DELUXE</h2>
            <p style="font-size: 1.5rem; font-weight: 800; margin-bottom: 40px;">L'expérience HOLY ultime. Teste toutes nos saveurs et reçois ton Shaker Thermo gratuitement.</p>
            <ul style="list-style: none; display: flex; flex-direction: column; gap: 15px; margin-bottom: 50px; padding: 0;">
                <li style="font-weight: 700; font-size: 1.2rem; display: flex; align-items: center; gap: 15px;">✅ 57 Portions (Energy, Tea, Hydration)</li>
                <li style="font-weight: 700; font-size: 1.2rem; display: flex; align-items: center; gap: 15px;">✅ Shaker Thermo Inclus</li>
                <li style="font-weight: 700; font-size: 1.2rem; display: flex; align-items: center; gap: 15px;">✅ Livraison 100% Gratuite</li>
            </ul>
            <a href="/nosproduits" class="btn" style="background: black; color: white; width: 100%; font-size: 2rem; padding: 30px;">PROFITER DE L'OFFRE</a>
        </div>
    </div>
</section>

<section class="section1">
    <div class="bento-grid">
        <article class="bento-item blue">
            <img src="/Image/daccord.png" alt="" style="width: 100px; position: absolute; top: 40px; right: 40px;">
            <h1>DES GOÛTS QUI CLAQUENT</h1>
            <p>Des saveurs explosives développées par des experts. Arômes et colorants 100% naturels.</p>
        </article>

        <article class="bento-item pink">
            <h1>ZÉRO<br>SUCRE</h1>
            <p>Le plaisir sans la culpabilité. On a viré le sucre, pas le goût.</p>
        </article>

        <article class="bento-item green">
            <div style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                <div style="max-width: 600px;">
                    <h1>PLUS ÉCONOMIQUE</h1>
                    <p>Seulement 0.80€ pour 0,5 L – bien moins cher que les canettes classiques.</p>
                </div>
                <img src="/Image/main-avec-money-gear.png" style="width: 200px;">
            </div>
        </article>
    </div>
</section>

<!-- Section Social Proof -->
<section class='backgroundnoir' style="padding: 60px; border-top: 3px solid black; border-bottom: 3px solid black; text-align: center;">
    <h2 style="color: var(--holy-yellow); font-size: 3rem;">⭐ 4,6 basé sur 113 223 avis clients satisfaits</h2>
</section>

<section class='section3'>
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 60px;">
        <h2>NOS BEST-SELLERS</h2>
        <a href="/nosproduits" style="font-weight: 800; text-decoration: underline;">VOIR TOUT →</a>
    </div>

    <div class='formage'>
        <?php foreach (($products ?? []) as $product): ?>
            <article class='article'>
                <a href="/produit?id=<?= $product['Id'] ?>" style="flex-grow: 1;">
                    <img src="/Image/image_produits/<?= htmlspecialchars($product['Image']) ?>" alt="<?= htmlspecialchars($product['Nom']) ?>">
                    <h3><?= htmlspecialchars($product['Nom']) ?></h3>
                    <p style="color: var(--holy-blue); font-size: 1.8rem; margin: 15px 0;"><?= number_format((float)($product['prix'] ?? 0), 2, ',', ' ') ?> €</p>
                </a>
                <form method="POST" action="/cart/add-from-form">
                    <input type="hidden" name="product_id" value="<?= $product['Id'] ?>">
                    <input type="hidden" name="quantite" value="1">
                    <button type="submit" style="width: 100%;" class="btn">AJOUTER AU PANIER</button>
                </form>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section style="padding: 100px 5vw; background: var(--holy-off-white); border-top: 3px solid black;">
    <div style="text-align: center; max-width: 900px; margin: 0 auto;">
        <h2 style="font-size: 4rem; margin-bottom: 30px;">QUE DU BON. ZÉRO BLABLA.</h2>
        <p style="font-size: 1.2rem; font-weight: 600; margin-bottom: 50px;">Pas de colorants artificiels, pas d'arômes de synthèse. Juste des antioxydants, des vitamines et du goût.</p>
        <a href="/ingredients" class="btn" style="background: var(--holy-green);">VOIR LA SCIENCE DERRIÈRE HOLY</a>
    </div>
</section>
