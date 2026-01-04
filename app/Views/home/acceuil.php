<!-- la section pour mon header -->

<section class="hero">
    <div class="text-hero">
        <h1>TESTE HOLY !</h1>
        <p>Fais-toi plaisir avec nos soft drinks sans culpabiliser –</p>
        <p>zéro sucre, 100 % goût. Rejoins les plus de 2 millions de</p>
        <p>personnes conquises !</p>
    </div>  
 
</section>
<!-- section 1 avec 3 articles -->
<section class='section1'>
    <div class='feature1'>
        <article class='feature'>
            <img src="/Image/Claim_Taste_140x.avif" alt="Goûts qui claquent">
            <h1 class='decalage1'>DES GOÛTS QUI CLAQUENT</h1>
            <p>Des goûts frais et fruités pour tout le monde & avec</p>
            <!-- 'p2' pour facilement creer l'espace que je veux avec mon CSS -->
            <p class='p2'>des arômes et des colorants naturels !</p>
        </article>

        <article class='feature'>
            <img src="/Image/Claim_NoBullshit_140x.avif" alt="Logo bonne conscience">
            <h1 class='decalage2'>UNE BONNE CONSCIENCE</h1>
            <p>Zéro sucre ou autre blabla – avec des antioxydants,</p>
            <!-- 'p2' pour facilement creer l'espace que je veux avec mon CSS -->
            <p class='p2'>des électrolytes & des vitamines.</p>
        </article>

        <article class='feature'>
            <img src="/Image/Claim_Money_140x.avif" alt="Logo Money">
            <h1>DES ÉCONOMIES</h1>
            <p>Seulement 0.80€ pour 0,5 L – moins cher que la majorité</p>
            <!-- 'p2' pour facilement creer l'espace que je veux avec mon CSS -->
            <p class='p2'>des boissons sucrées ou énergétiques.</p>
        </article>
    </div>
</section>

<!-- section 2 -->
<section class='section2'>
    <div class='backgroundnoir'>
        <article class ='textlogo'>
        <img src="/Image/reviewsio-logo--inverted.svg" alt="logo reviewsio">
        <h2 class='avis'>4,6 Basé sur 113 223 avis</h2>
        </article>
    </div>
</section>
<!-- section 3 pour mes Produits(articles) -->

<section class='section3'>
    <nav class='textsection3'>
        <br>
        <br>
        <h1>Nos Produits</h1>
        <p>Une gamme. Tous les best-sellers !</p>
    </nav>
    <!-- Créations de 4 articles car j'ai plusieurs fois le même assemblage qui se répètent -->
    <section class='blockimage'>
    <div class='formage'>
    <?php foreach ($products as $product): ?>
        <article class='article'>
            <a href="/produit?id=<?= $product['Id'] ?>">
                <img src="Image/<?= htmlspecialchars($product['Image']) ?>" alt="">
                <h3><?= htmlspecialchars($product['Nom']) ?></h3>
            </a>
        </article>
    <?php endforeach; ?>
    </div>
    </section>
    </section>

<!-- section 4 avec 3 articles -->


<section class='section4'>
    <nav>

        <h1>COMMENT FAIRE mon SHAKER ?</h1>
        <div class='feature3'>
            <article class='article'>
                <img src="Image/3_df65f400-f4c9-429a-b46b-3bc06e0ba098_1000x.webp" alt="">
                <h2>ETAPE 1</h2>
                <p class='p1'>Remplis ton shaker avec 500ml d'eau froide</p>
                <p class ='p2'> et une portion de HOLY</p>
            </article>
            
            <article class='article'>
                <img src="/Image/Product_picture_photoshoot_shot_14_1000x.webp" alt="">
                <h2>ETAPE 2</h2>
                <p class='p1'>Mettre des glaçon et secouer son shaker</p>  
            </article>

            <article class='article'>
                <img src="/Image/4_833b8aef-e278-49ac-9400-463847ca8e9b_1000x.webp" alt="">
                <h2>ETAPE 3</h2>
                <p class='p1'>TADA! Tu n'as qu'à savourer</p>
            </article>
        </div>
    </nav>
</section>
<div class='séparation'>
    <img src="/Image/Bordure.png" alt="bordure">
</div>
<!-- section 5 pour me contacter -->



        
